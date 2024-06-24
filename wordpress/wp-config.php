<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'corenet-db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$;ryPy8(Dib19rz`3&[/x*3le*/K:k90=Q9Q+^wF|:Q`y$lJd-+]Jl:b43AB+V9b' );
define( 'SECURE_AUTH_KEY',  'l!rrg~qZd/B~OP7M5n5DP TX,aSDJrN0`?=dqAf4ODLb1^Kj0_/V]K>T| )C*Rn7' );
define( 'LOGGED_IN_KEY',    ')6JVTgQ:w#GcEa?FI)H 4M+BV,Bne^D]vQI[mOC5kwc-/}p2~m vNCTu8a5YD,SU' );
define( 'NONCE_KEY',        '{r0_GMWi(lM~xX.){bqF%FnmJhUQlzZeCx{CW|mgt.GgKoqax;~^wKda<SX(sTUH' );
define( 'AUTH_SALT',        '$`ZMIsAGi8CYN:MIzE5>43tm`ptBjj%jce|P%ei9&``{g0p6Ber@`W`aZ<nZN9?a' );
define( 'SECURE_AUTH_SALT', 'R[Ii2_p$L]reE/1d=5,5c,Qsmaq/ fJ]@{l24K]i]BC34uNe^jreDR1ccg:z<X95' );
define( 'LOGGED_IN_SALT',   'X)bunP#DzTKOIKoq<dT4*ZctzV{O RXmZ6:z*idq6_BV5]cn0&+(hf+`r!Fs3bgt' );
define( 'NONCE_SALT',       '@f(`qtzuF79c5+[Trum1^ob(02XYa=}dy<D;.3eh;1t[f>;^vKu=l`|p9dAmooNp' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
