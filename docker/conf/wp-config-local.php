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
define( 'DB_NAME', $_ENV['DB_NAME'] );

/** MySQL database username */
define( 'DB_USER', $_ENV['DB_USER'] );

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );

/** MySQL hostname */
define( 'DB_HOST', $_ENV['DB_HOST']);

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<<JQ#P&Fjha]}KA4XN9}k6ry {N-b]hx;a69C6|g.lw}zQiI+GD>=<Xo)WiPNpzy');
define('SECURE_AUTH_KEY',  'E!$gY`bm2bA@10v|gM+:_ne~ UIniI*)U7aH&UGk-BiZ@jRUNtDyN[)|NXVLP+L0');
define('LOGGED_IN_KEY',    'FBr+OV+1}Dl[e)a|P|PAK4Q27bUG{2pYh&nDK`C9^P1/wl9=`X]2Y&3BDvBj]q 0');
define('NONCE_KEY',        '.7Qj=RK]q Sh1V<Wz7<)QSkG6uh%;@2k:IAL={/t|)hq2FZO?B(tyNdYLCCpC.kc');
define('AUTH_SALT',        'Et)HRIQ]ElD&h0%ikWIVPd|Dds@0P/>|D7z#s.NGs~)p{y,G#]D]sK-+!qeC#W24');
define('SECURE_AUTH_SALT', '> U,TDI3)^)/J>|gfXoJE]~tm|^vv_2LwtH!^lYbx>YBE^h-hby4>,w9=8-+6RTY');
define('LOGGED_IN_SALT',   '-p_JyZ_NO^Uo.wxzVH8r-+c~<Br0/-Nt(3Qc.W~|^{I49|)2sJ(rwu]p|>gB`CSd');
define('NONCE_SALT',       '-+T|1c]^?mVZrhmUj%.vIx/6B/Y><WFx/+9W4,Og?~9|J-5M0+OXII^t%[~0Q[lF');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define('FORCE_SSL_ADMIN', true);
if ( $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

