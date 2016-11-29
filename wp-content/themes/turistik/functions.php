<?php
// Если плагин Timber не установлен, выдаем предупреждение в админке
if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Плагин'
            .' <a href="https://wordpress.org/plugins/timber-library/">Timber</a>'
            .' не активирован. Установите и активируйте его для корректной работы темы Turistik.</p></div>';
    });
    return;
}

// Указываем путь, где хранятся шаблоны для Timber
Timber::$dirname = ['templates', 'views'];

// Регистрируем наши стили для добавления в хедер темы
wp_enqueue_style('libs', get_template_directory_uri() . '/css/libs.min.css');
wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
wp_enqueue_style('media', get_template_directory_uri() . '/css/media.css');
