<?php

/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'malik_dev');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');
define( 'WPLANG', 'ru_RU' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'b_EnJaE]=`l|kN!T8z&k?/%k|/,7^0/dx=b-0@zIDGxwG?buYj&JOKN.bT^gDkQq');
define('SECURE_AUTH_KEY',  '0kq,wn~!xLGh@}L ks];{]&P/7B[gT.%Xg2->^&i,u{q!+16yGCzKXI;xTg61wIl');
define('LOGGED_IN_KEY',    '#xM1~#t=;_Fu!Tz |DaBb2zT!+xe#FG)Gq_Kb&zD&v|X>.<z9CUX.E+UjGMM`i|:');
define('NONCE_KEY',        'SDDdeuCOm]v,?%RkvoLU%>E]lATm7lxhiGCK~!`2Ob*%e8+Mu^ ^@n]@SpphI<S]');
define('AUTH_SALT',        'u}&x<z=L<~YFSEFo-i6pJEjc-%GxhfOW0tQ.RmFT#s2u*]ZNH}]d7_2#xs;5.I7:');
define('SECURE_AUTH_SALT', 'rt@JQS{XK-NGJ]YS uEjNw]_,r]$U<Lf>1{ McTnA|0,>!_qShu&n%a,PkF_$_mT');
define('LOGGED_IN_SALT',   '#k`f{bV4>B>{>0fzLY7QK]={Y~>QV:Xm`,tD? ?INvE7b4LAr|Gv<i:8|z)_B[Nd');
define('NONCE_SALT',       '>v@W!#8dwd8[Je>B9#k>9E0B4p3XW#bEMH(m4qRq?d /3l}LOR{}z%T!VwoS@~w8');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');