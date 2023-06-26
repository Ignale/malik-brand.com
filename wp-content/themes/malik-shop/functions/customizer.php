<?php

function malik_brand_customize_register($wp_customize)
{
  $transport = 'postMessage';
  if ($section = 'display_options') {
    $wp_customize->add_section($section, [
      'title'     => 'Настройка баннера',
      'priority'  => 200,                   // приоритет расположения // описание не обязательное
    ]);
    // настройка
    $setting = 'banner_img';

    $wp_customize->add_setting($setting, [
      'transport'   => $transport
    ]);
    $wp_customize->add_setting('banner_title', [
      'transport'   => $transport,
      'sanitize_callback'  => 'sanitize_text_field',
    ]);
    $wp_customize->add_setting('banner_text', [
      'transport'   => $transport,
      'sanitize_callback'  => 'sanitize_text_field',
    ]);

    $wp_customize->add_control(
      new WP_Customize_Image_Control($wp_customize, $setting, [
        'label'    => 'Изображение баннера',
        'section'  => 'display_options',
        'settings' => $setting
      ])
    );
    $wp_customize->add_control('banner_title', [
      'section' => 'display_options',
      'label'   => 'Заголовок баннера',
      'type'    => 'text',
    ]);
    $wp_customize->add_control('banner_text', [
      'section' => 'display_options',
      'label'   => 'Текст в баннере',
      'type'    => 'text',
    ]);
  }
};
add_action('customize_register', 'malik_brand_customize_register');
