<?php
function prefix_register_meta_boxes($meta_boxes)
{
  $meta_boxes[] = array(
    'id'         => 'slider_options',
    'title'      => 'Настройка слайдера',
    'post_types' => 'post_type_dress',
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(
      array(
        'id'        => 'on_of_gallery',
        'name'      => 'Показывать слайдер?',
        'type'      => 'switch',

        // Стиль: rounded (по умолчанию) или square
        'style'     => 'square',
        'on_label'  => 'Да',
        'off_label' => 'Нет',
      ),
      array(
        'id'               => 'slider_items',
        'name'             => 'Картинки слайдера',
        'type'             => 'file_upload',
        'force_delete'     => false,

        'max_file_uploads' => 10, // макс. можно загрузить

        'mime_type'        => 'image / gif, image / png, image / jpeg, image / bmp, image / webp', // типы файлов

        'max_status'       => true, // Не показывать сколько еще файлов можно загрузить
      ),
    )
  );

  // Ещё метабоксы
  $meta_boxes[] = array(
    'id'         => 'additional_text',
    'title'      => 'Дополнительный текст',
    'post_types' => 'post_type_dress',
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(
      array(
        'id'        => 'on_of_add_text',
        'name'      => 'Показывать дополнительный текст?',
        'type'      => 'switch',
        'std'       => 'off',

        // Стиль: rounded (по умолчанию) или square
        'style'     => 'square',
        'on_label'  => 'Да',
        'off_label' => 'Нет',
      ),
      array(
        'name'    => '',
        'id'      => 'additional_text_field',
        'type'    => 'wysiwyg',
        'condition' => 'on_of_add_text:is(on)',

        'options' => array(
          'textarea_rows' => 4,
          'teeny'         => true,
        ),
      ),

    )
  );
  return $meta_boxes;
}