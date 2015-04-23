<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'monish_wp_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '|gScl!OW3YDZf0fOsKHZG<%5~a~<GSrVu~/|.^+n=^L_s}-*_Pywun`tM8PAf6fC');
define('SECURE_AUTH_KEY',  '5OoL[ti1#[,z[)Ke(8@&uFa0>7{_hT+c_6cb?iN=~fjpBcSfTDBaNF8 t {t&0-i');
define('LOGGED_IN_KEY',    '-P}jA/@R}R)7RAEn/G7@Wl.=5]!r(9hozXrXP$qNF5w~>+@yc<r_HUmIxbO1Y2)I');
define('NONCE_KEY',        'Lg=sO]EJoB3cGdY8c/el3|Pe4~w3oDYU[,IF*iBnD:Z[?g$s,A;$||&Z^_Nzi:U$');
define('AUTH_SALT',        '->_s<2vOVpH&$UgaH.@M*3vh*8v+Bo|FC&QXE+KEQ@-0etP>zLK~Ua]*|zQ%GGFV');
define('SECURE_AUTH_SALT', '?G2}Eeh CH6II0z-U4qy@^IkR{;0oYE(1-mQAU92e]x60Jva%+p-f=jkT,^/|s.w');
define('LOGGED_IN_SALT',   '-h4,Q+WYUn,s:lq9;Mrf)xKB|:_7N,f*YYhR R61aV<LxXgc^fB-bu3B8Y<5b?go');
define('NONCE_SALT',       'i+o9L{l-]+80}a6geJ%uK1-2(|xIZtZPc[uA|D0e.3AK@ppG:g?(2Y 0dYG||||<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
