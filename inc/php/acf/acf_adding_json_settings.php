<?php

add_filter('acf/settings/save_json', function ($path) {
    return get_stylesheet_directory() . '/inc/acf_jsons';
});

add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/inc/acf_jsons';
    return $paths;
});

if (class_exists('ACF') && !class_exists('ACF_Admin_Field_Groups_Custom_Check_Sync')) :

    class ACF_Admin_Field_Groups_Custom_Check_Sync
    {
        private int $count = 0;
        private string $cookie = 'acf_turn_of_error_message';

        public function __construct()
        {
            add_action('init', [$this, 'start']);
        }

        public function start(): void
        {
            if (defined('ACF_VERSION') and intval(ACF_VERSION) >= 5) {
                $this->setup_sync();
                if (!empty($this->count)) {

                    if (empty($_GET['post_type']) or $_GET['post_type'] !== 'acf-field-group') {
                        if (!isset($_COOKIE[$this->cookie]) && !str_contains($_SERVER['REQUEST_URI'], 'wp-login')) {
                            wp_die($this->get_notice());
                        } else {
                            add_action('admin_notices', function () {
                                echo '<div class="notice notice-error"><h2>' . $this->get_notice() . '</h2></div>';
                            });
                        }
                    }
                }
            }
        }

        public function setup_sync(): void
        {
            if (acf_get_local_json_files()) {
                $all_field_groups = acf_get_field_groups();
                foreach ($all_field_groups as $field_group) {
                    $local = acf_maybe_get($field_group, 'local');
                    $modified = acf_maybe_get($field_group, 'modified');
                    $private = acf_maybe_get($field_group, 'private');
                    if ($private) {
                        continue;
                    } elseif ($local !== 'json') {
                        continue;
                    } elseif (!$field_group['ID']) {
                        $this->count++;
                    } elseif ($modified && $modified > get_post_modified_time('U', true, $field_group['ID'])) {
                        $this->count++;
                    }
                }
            }
        }

        public function get_notice(): string
        {
            $turn_off = !isset($_COOKIE[$this->cookie]) ? ' or <a href="#" onclick="%s">turn of this message</a>' : '';
            $js_onclick =
                'let date = new Date();date.setTime(date.getTime() + (60*60*1000)); date.toUTCString();' .
                'document.cookie = \'' . $this->cookie . '=1; expires=\' + date + \'; path=/\';' .
                'window.location.reload();';

            return sprintf(
                'Attention! You have to  <a href="%s">%s <span class="count">(%s)</span></a>' . $turn_off . '.',
                esc_url(admin_url('edit.php?post_type=acf-field-group&post_status=sync')),
                esc_html(__('Sync available', 'acf')),
                $this->count,
                $js_onclick
            );
        }

    }

    new ACF_Admin_Field_Groups_Custom_Check_Sync();

endif;
