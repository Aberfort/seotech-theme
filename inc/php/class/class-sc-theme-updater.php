<?php
/**
 * Class SCHelperThemeUpdater
 *
 * Адаптований клас для оновлення теми через кастомний JSON-файл
 */

if ( ! class_exists( 'SCHelperThemeUpdater' ) ):

	class SCHelperThemeUpdater {

		/**
		 * Ключ для зберігання кешу (transient)
		 *
		 * @var string
		 */
		public $cache_key;

		/**
		 * Чи дозволено кешувати відповідь
		 *
		 * @var bool
		 */
		public $cache_allowed;

		/**
		 * Шлях до JSON-файлу, де зберігаються дані про оновлення теми
		 *
		 * @var string
		 */
		public $json_file;

		/**
		 * slug (папка) теми
		 *
		 * @var string
		 */
		public $theme_slug;

		/**
		 * Поточна версія теми
		 *
		 * @var string
		 */
		public $theme_version;

		public function __construct() {

			// Задайте свій унікальний ключ для transient
			$this->cache_key = 'sc-theme-seotech-updater';

			// Дозволити або заборонити кеш
			$this->cache_allowed = false;

			// Приклад, де ми вказуємо URL з info.json та додаємо query-параметр із версією (щоб уникати кешування)
			$this->theme_slug    = 'seotech'; // <- назва папки теми
			$this->theme_version = $this->get_theme_version();
			$this->json_file     = 'https://stageseotech.t42it.info/wp-content/themes/seotech/info.json';

			$this->init_hooks();
		}

		/**
		 * Отримати поточну версію теми з файлу style.css
		 *
		 * @return string
		 */
		private function get_theme_version() {
			// Можна так:
			$theme = wp_get_theme($this->theme_slug);
			if ( $theme && $theme->exists() ) {
				return $theme->get('Version');
			}
			return '1.0.1';
		}

		/**
		 * Ініціалізація потрібних фільтрів/хукiв
		 */
		public function init_hooks() {
			// 1. Інформація про тему (аналог plugins_api -> themes_api)
			add_filter('themes_api', array($this, 'update_theme_info'), 20, 3);

			// 2. Перевірка оновлень тем (аналог site_transient_update_plugins -> site_transient_update_themes)
			add_filter('site_transient_update_themes', array($this, 'update_theme'));

			// 3. Очищення кешу після встановлення оновлення
			add_action('upgrader_process_complete', array($this, 'update_theme_purge'), 10, 2);
		}

		/**
		 * Звертаємося до віддаленого JSON, дістаємо дані про оновлення
		 */
		public function update_theme_request() {

			$remote = get_transient($this->cache_key);

			if ( false === $remote || ! $this->cache_allowed ) {

				$remote = wp_remote_get(
					$this->json_file,
					array(
						'timeout' => 10,
						'headers' => array(
							'Accept' => 'application/json'
						)
					)
				);

				if (
					is_wp_error($remote)
					|| 200 !== wp_remote_retrieve_response_code($remote)
					|| empty(wp_remote_retrieve_body($remote))
				) {
					return false;
				}

				// Зберігаємо у transient
				set_transient($this->cache_key, $remote, DAY_IN_SECONDS);
			}

			// Розбираємо JSON
			$remote = json_decode( wp_remote_retrieve_body( $remote ) );

			return $remote;
		}

		/**
		 * Підміняє інформацію про тему, коли WordPress викликає themes_api('theme_information', ...)
		 */
		public function update_theme_info($res, $action, $args) {

			// Якщо запит не на інформацію про тему - нічого не робимо
			if ( 'theme_information' !== $action ) {
				return $res;
			}

			// Якщо запрошений slug теми не співпадає з нашим - нічого не робимо
			if ( ! isset($args->slug) || $args->slug !== $this->theme_slug ) {
				return $res;
			}

			// Отримуємо дані про оновлення
			$remote = $this->update_theme_request();

			if ( ! $remote ) {
				return $res;
			}

			// Формуємо об'єкт відповіді (аналог об'єкта з .org)
			$res = new stdClass();

			$res->name         = $remote->name;
			$res->slug         = $remote->slug;          // повинен збігатися з $this->theme_slug
			$res->version      = $remote->version;
			$res->tested       = isset($remote->tested) ? $remote->tested : null;
			$res->requires     = isset($remote->requires) ? $remote->requires : null;
			$res->download_link = $remote->download_url; // посилання на ZIP
			$res->requires_php = isset($remote->requires_php) ? $remote->requires_php : null;
			$res->last_updated = isset($remote->last_updated) ? $remote->last_updated : null;
			$res->author       = isset($remote->author) ? $remote->author : 'Your Company';
			$res->author_profile = isset($remote->author_profile) ? $remote->author_profile : '';

			// Опис / секції, аналог плагінів
			if ( isset($remote->sections) ) {
				$res->sections = (array) $remote->sections;
			} else {
				$res->sections = array(
					'description' => 'No description provided.'
				);
			}

			// Банери (якщо потрібні для сторінки деталей)
			if ( ! empty($remote->banners) ) {
				$res->banners = (array) $remote->banners;
			}

			return $res;
		}

		/**
		 * Додає інформацію про нову версію теми у transient, щоб WP знав, що оновлення існує
		 */
		public function update_theme($transient) {

			// Якщо ще не завантажено список перевірок
			if ( empty($transient->checked) ) {
				return $transient;
			}

			// Поточна версія теми
			$current_version = $this->theme_version;

			// Отримуємо JSON з даними
			$remote = $this->update_theme_request();

			// Якщо дані отримано і є новіша версія
			if (
				$remote
				&& isset($remote->version)
				&& version_compare($current_version, $remote->version, '<')
			) {
				// Додаткові перевірки (на PHP версію, версію WP тощо) – опційно
				if (
					isset($remote->requires)
					&& version_compare($remote->requires, get_bloginfo('version'), '>')
				) {
					// Якщо тема вимагає версію WP вищу, ніж в нас, пропустимо
					return $transient;
				}

				if (
					isset($remote->requires_php)
					&& version_compare($remote->requires_php, PHP_VERSION, '>')
				) {
					// Якщо тема вимагає вище версії PHP
					return $transient;
				}

				// Формуємо дані про оновлення
				$transient->response[$this->theme_slug] = array(
					'theme'       => $this->theme_slug,
					'new_version' => $remote->version,
					'url'         => isset($remote->homepage) ? $remote->homepage : '',
					'package'     => $remote->download_url, // ZIP-файл
				);
			}

			return $transient;
		}

		/**
		 * Очищуємо кеш після успішної установки теми
		 */
		public function update_theme_purge($upgrader, $options) {

			if (
				$this->cache_allowed
				&& 'update' === $options['action']
				&& 'theme' === $options['type']
			) {
				// Коли оновлення завершилося, видаляємо transient, щоб при наступній перевірці вже був свіжий
				delete_transient($this->cache_key);
			}
		}
	}

endif;

new SCHelperThemeUpdater();
