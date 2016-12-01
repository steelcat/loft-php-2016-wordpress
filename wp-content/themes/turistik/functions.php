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

// Регистрируем наши стили для добавления в хедер темы, если мы не в админке
if (!is_admin()) {
    wp_enqueue_style('libs', get_template_directory_uri() . '/css/libs.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('media', get_template_directory_uri() . '/css/media.css');
}

// Добавляем поддержку картинок для постов и страниц
add_theme_support('post-thumbnails');

// Размер картинки поста по умолчанию
set_post_thumbnail_size(825, 510, true);

// Добавляем новый размер картинок
add_image_size('article-image', 380, 300, true);

// Регистрируем меню
register_nav_menus([
    'main-menu' => __('Primary Menu', 'turistik'),
]);

// Регистрируем сайдбар как место для расположения виджетов
function turistik_widgets_init()
{
    register_sidebar([
        'name'          => __('Widget Area', 'turistik'),
        'id'            => 'sidebar-main',
        'description'   => __('Add widgets here to appear in your sidebar.', 'turistik'),
        'before_widget' => '<div class="sidebar__sidebar-item">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sidebar-item__title">',
        'after_title'   => '</div>',
    ]);
}
add_action('widgets_init', 'turistik_widgets_init');
