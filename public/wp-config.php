<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Bt+xRFEnyyUpFucCXSHnZJD5FycgI/TqCsBTRkoX9Ho4EpQkQSUhM+PuHm8xyXfebX9XRLdmlLfz/QVDv/ZjDQ==');
define('SECURE_AUTH_KEY',  'JjfpoewKef17brwmgeBYZmZlCSc19aqHyWrH7/M1RpVvcQ43DVgZtPtuA44b+hzREJxLv0KprCfL88cmw8ZK8g==');
define('LOGGED_IN_KEY',    'iO1/ndptwdTa4esZi3ho50yd7B82QLFIAqCVJ7wxaaqR1u9hip6pcxH/X/8KQe2yVIG2U9Vb2STA81s8TX8Qbw==');
define('NONCE_KEY',        'MvGyA0FpnO8Hh+W4qXOhriysF8fcjGIanlwHbxbfhfaLs94mql8PisOxG5ULjLtV9qtQrV2i8eZ9hASvmx5n7g==');
define('AUTH_SALT',        'HBX7gpCIrNjZtR4qaLkzctXY7at3LnbGcNAxmgWT7ujvIQGE0jqYuW6+xW2uCXk/0EqxtUaFwjlrs4f0pWM/8w==');
define('SECURE_AUTH_SALT', '3WREnlC+4230n4+uJduviIFBlCHQCs0Oi6q5MHPngf3GJvaIlbJkflhUz5pA29Hy2UTd8JW+MvAxYuvOmEAdbw==');
define('LOGGED_IN_SALT',   'cnSyKUlmq7baqYjnFenYh7vWeCvVwhho3CK9ibVqKNHHs99m5H3BjGlfOndOxdBeGW7j1jzULLK2NgwGaIoVag==');
define('NONCE_SALT',       'r9Co4jduLiElpHTWdWhFeYFt6T0xmSBCqRfWU9gWqkImBcfGeAhik9JvDWA2D/zIgOYgs635yZWUTFAzTWLEcw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
