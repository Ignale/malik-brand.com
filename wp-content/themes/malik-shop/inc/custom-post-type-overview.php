<?php
// Register Custom Post Type
function look_post_type()
{

  $labels = array(
    'name'                  => 'Примерочная',
    'singular_name'         => 'Одежда',
    'menu_name'             => 'Лукбук',
    'name_admin_bar'        => 'Лукбук',
    'archives'              => '',
    'attributes'            => 'Метки',
    'parent_item_colon'     => '',
    'all_items'             => 'Все',
    'add_new_item'          => 'Добавить новый предмет',
    'add_new'               => 'Добавить новый',
    'new_item'              => 'Новый предмет',
    'edit_item'             => 'Редактировать',
    'update_item'           => 'Обновить',
    'view_item'             => 'Просмотр',
    'view_items'            => 'Просмотр всех',
    'search_items'          => 'Поиск',
    'not_found'             => '',
    'not_found_in_trash'    => '',
    'featured_image'        => 'Миниатюра',
    'set_featured_image'    => 'Установить миниатюру',
    'remove_featured_image' => 'Удалить миниатюру',
    'use_featured_image'    => 'Использовать миниатюру',
    'insert_into_item'      => '',
    'uploaded_to_this_item' => '',
    'items_list'            => '',
    'items_list_navigation' => '',
    'filter_items_list'     => '',
  );

  $args = array(
    'label'                 => 'Одежда',
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'comments'),
    'hierarchical'          => false,
    'public'                => true,
    'taxonomies'            => array('category'),
    'show_ui'               => true,
    'show_in_rest'          => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-gallery',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'query_var'             => 'primerochnaja-ru',
    'rewrite'               => '',
    'capability_type'       => 'page',
  );
  register_post_type('post_type_dress', $args);
}
add_action('init', 'look_post_type', 0);
