# SeoTech Theme
Каждый отдельный компонент – это папка с php, js и css-файлами, необходимым для подключения компонента к сайту.

**Тема для WP**

Директория /seotech содержит в себе тему WP c новым сборщиком на компонентном подходе

**Builder version 2.3**

**Сборщик темы**

seotech/builder-scripts - папка самого билдера

**Он разделен на**
seotech/builder-scripts/entry-points-description - директория которая содержит js файлы которые формируют стили и скрипты для отдельных типовых страниц
они подключаются через индификаторы в файле seotech/builder-scripts/entry-points.json.
А условия их подключения указываются в статическом методе файла seotech/builder-scripts/BuilderConfigs.php

```

**Пример использования**

/**
 * Зависимости Ключей скриптов к условию их вывода
 * Варианты условий:
 * "-1" - Подключить на всех страницах
 * "ID" - Можно указать ID конкретной страницы
 * "is_front_page()" - Условие проверки страницы
 * Если в названии ключа есть часть "singleCritical" например "singleCritical-blog" - это будет отдельный критическийх стиль для страницы.
 */
public static function getConditionsList(): array
{
    return [
        'main' => [-1],
        'homePage' => [is_front_page()],
    ];
}

```

так же там есть дополнительные настройки оптимизации через кэширование

```
/**
 * Конфигурации оптимизации работы подключения скриптов
 * Для активации Redis необходимо задать RedisRun => true и указать RedisHost
 * Для активации Memcached необходимо задать MemcachedRun => true и указать MemcachedHost, MemcachedPort
 * Если оба параметра активны то приоритет будет у Redis
 * HardCheck - жесткая проверка работы кэширования, если отключить то не подключившись скрипт будет работать в стандартном режиме без кэша
 */
public static function getConfig(): array
{
    return [
        'HardCheck' => false,
        'RedisRun' => false,
        'RedisHost' => 'Redis',
        'MemcachedRun' => false,
        'MemcachedHost' => 'Memcached',
        'MemcachedPort' => 11211
    ];
}
```

**Директория seotech/builder-scripts/stats**

Создана для хранения seotech/builder-scripts/stats/stats.json которые создает сборщик автоматически и содержит зависимости стилей и скриптов

**Директория seotech/builder-scripts/inc**

В ней есть файл с классом seotech/builder-scripts/inc/AdderBundles.php который отвечает за логику выбора стилей и скриптов для определенной страници.

а так же файл seotech/builder-scripts/inc/adder-source.php - который через хук `wp_head` и `wp_footer` подключает стили и скрипты на страницу

**Критические стили**

Для их создания используется файл seotech/builder-scripts/entry-points-description/critical.js куда необходимо добавлять все критические стили, а он автоматически их собирает и добавляет в тег `<style>` в `<head>` страницы

Если вам нужно создать отдельный критический стиль для определенного раздела или страницы вы можете его создать указав в builderConfigs.php ключь начинающийся с "singleCritical" например "singleCritical-blog", и задать условия для него, тогда стили которые сгенерируются на основании этого ключа подключатся к конкретному разделу или странице.
**Старайтесь не дублировать подключения в стандартный и критических стилях**


**Специфика подключения картинок и шрифтов в scss**
из-за специфики работы сборщика для коректной работы нужно указывать путь в scss через выход из папки ../, а затем уже путь
```
background-image: url("../home-banner/img/bg.svg");
```

**Структура темы**

**seotech/builder-scripts** - сборщик

**seotech/inc** - все дополнительные js, php, scss файлы которые не относятся к определенному компоненту, но нужны для работы темы

**seotech/partials** - партии, части темы которые содержат в себе набор компонентов (то есть это секция которая состоит из нескольких компонентов и имеет свои стили )

**seotech/templates** - шаблоны страниц состоящие из компонетов

**seotech/components -** компоненты:
они в свою очередь должны состоять из php,js,scss файлов, а так же дополнительных папок пример /img



**Для работы темы нужен npm и composer (node v14 )**
в папке темы wp-content/themes/seotech/ запускаем

```jsx
npm install
composer install
```

**После установки сборщика можно собрать стили и скрипты сайта**
для этого в папке темы wp-content/themes/seotech/ запускаем  команду

```jsx
npm run build
```
**При работе с проектом можно использовать**

```
npm run watch

npm run build
```

**Настройка gitignore**

```
/wp-content/themes/seotech/vendor/
/wp-content/themes/seotech/bundles/
/wp-content/themes/seotech/node_modules/
/wp-content/themes/seotech/builder-scripts/stats/stats.json
```
