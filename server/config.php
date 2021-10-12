<?php
/*
 * Telegram Bot Sample
 * ===================
 * UWiClab, University of Urbino
 * ===================
 * Configuration file.
 */

define('TELEGRAM_BOT_TOKEN', getenv('TELEGRAM_BOT_TOKEN'));
define('TELEGRAM_API_URI_BASE', 'https://api.telegram.org/bot' . TELEGRAM_BOT_TOKEN . '/');
define('TELEGRAM_FILE_API_URI_BASE', 'https://api.telegram.org/file/bot' . TELEGRAM_BOT_TOKEN . '/');

// Optional configuration: fill in if you use a MySQL database
//iDP 2021
// and make use of the library functions in lib_database.php
//define('DATABASE_HOST', getenv('DATABASE_HOST'));
//define('DATABASE_NAME', getenv('DATABASE_NAME'));
//define('DATABASE_USERNAME', getenv('DATABASE_USERNAME'));
//define('DATABASE_PASSWORD', getenv('DATABASE_PASSWORD'));
//define('DATABASE_SOCKET', getenv('DATABASE_SOCKET'));
define('DATABASE_HOST', '62.149.150.178');
define('DATABASE_NAME', 'Sql936232_5');
define('DATABASE_USERNAME', 'Sql936232');
define('DATABASE_PASSWORD', 'g2cq6ha002');
//end iDP 2021

// PHP configuration
date_default_timezone_set('UTC'); // ensure UTC is used for all date functions
set_time_limit(0); // ensure scripts are not interrupted (e.g., long-polling or downloads)
