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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'andrewcoDBeusbj');

/** MySQL database username */
define('DB_USER', 'andrewcoDBeusbj');

/** MySQL database password */
define('DB_PASSWORD', 'YdVy2mspvd');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8!wkZNC4:-slZKC5:|-slZR;.xqiaPHA;.+tbTLE2{.+qiaPHA9;#~tleWLD5;_-m');
define('SECURE_AUTH_KEY',  'J4}^vncUJB0>vocVJB4>@vkYYMF3{^ynfUMB3,zngYMF3}^znf~slZSK81|-ohOG9');
define('LOGGED_IN_KEY',    'K4[@wkdRG1|~slZRG8:|-sLD2]*xmeSL92]xmeXLE2]*xmeaSH9;#-thaOH5#+tia');
define('NONCE_KEY',        'hRG80[@wodVG81|~wodVOG4:|@zskYRJB0>!zogYJ80[!vogVNF80|haSH91]~xpd');
define('AUTH_SALT',        'D:_-pohZOG81[@wodVNG:|~sldVKC5:!-s{.+qiaTHA2].xqbPIA{.yXLE66]_+pi');
define('SECURE_AUTH_SALT', '^vjbQIB>^vncUJB>$vqjXQE6{.yqfXM7{,yrfUMA3<$uJB0>@rkYRF7}zsgZNF4');
define('LOGGED_IN_SALT',   'MB>$vgUNF70,@vncUNF~wphWOG9:|~sldOD5:#-tldSKD5[[!-ohZNG80[@wogOG');
define('NONCE_SALT',       '9]*tlaSH9;#tmaTHA2#*tmaSOH5:_-phWOD1_xpeWOD5]_xpdA<$ufXME3{*yfXM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
