<?php
/**
 * Индексный файл для использования с плагином Timber
 */

$context = Timber::get_context();
$context['menu'] = new TimberMenu('main-menu');
$context['page'] = new Timber\Post();
$context['sidebar'] = Timber::get_sidebar('sidebar.php');
$templates = ['index.twig'];
if (is_front_page()) {
    $context['frontpage_title'] = 'Последние новости и акции из мира туризма';
    $context['posts'] = Timber::get_posts('post_type=post&numberposts=8&orderby=data');
    array_unshift($templates, 'frontpage.twig');
}
Timber::render($templates, $context);
