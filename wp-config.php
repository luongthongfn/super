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
define('DB_NAME', 'super');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '~E(nyq~@Yq7cr?yFLK.@i_+H/JeR@V.NwdB^Jx6RwH;Hl:bA5)2!}U?M$wsE26mb');
define('SECURE_AUTH_KEY',  '}um6t+2%?xVDN/U?-l|LGK5oi98zDiRNF.su3|`>J{7*b(>h/suDFzzaB3FVz?4&');
define('LOGGED_IN_KEY',    'h:7/-lMp>`G:Py>bmx,mo$,ix7&&lAQ6E3.gWhs37,}jwN3@<&#=j?0mEUw#dP~^');
define('NONCE_KEY',        'z=23.l%|)_J4h<xTG!OoFDnGo/5@II>9X`thI7Ra)Q_&~1!B,.MU/TVryUI*w#_1');
define('AUTH_SALT',        '-Py{+s`jjll/NEQfIKxjv$.X9H_0_l%@-@TQN;DoVs,dIa N$;v`ne?),<UM.Z%Q');
define('SECURE_AUTH_SALT', 'e6Di*]VrkOLr,(YB}d3:A+Kc9Bg5; _G@e5heCg:X5(JR,:rXYT+!#96jd%(Qf;:');
define('LOGGED_IN_SALT',   '{8X)+2zq)&Xv)^B-crHUkMR{nQiP*F~Yr9+<NmEQGJ;va!<z $<}iI9A(y4~Ft$>');
define('NONCE_SALT',       '^,M~eVBD?W2Zodt_[-a%KKOb47]Jb=F8@PrDw#|({)n^R<<Lo+Og9VmjBNNA0@}b');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
