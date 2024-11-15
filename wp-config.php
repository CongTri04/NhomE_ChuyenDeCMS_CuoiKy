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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_602_core' );

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
define( 'AUTH_KEY',         'Dyd@`s[8E}6vw=Y_+An=Ilc_52dTzG^xXF@j24G9a-VyJOpSW@8K]4bp7$dRVke<' );
define( 'SECURE_AUTH_KEY',  'C^tUie=wSiGtf.Moy9)gS/Nw)D]l~wVwg^>1-ehyI<_M$WH]svC~gk]x`6KP:}(k' );
define( 'LOGGED_IN_KEY',    ';f{)=s7~#Zt>p:o%%<g9lI;DG#=*4>HcwQAy!&_aNo<1GgAt@rua[>G*(gNDnVfC' );
define( 'NONCE_KEY',        'udcpjBjG<*;uB(L-M0p}zlHS{$FX3KvW9TFlw>xG(ZrpMFbhrxN+FYm_tN}Y(I,H' );
define( 'AUTH_SALT',        'fgL%p8=JfJ]]XurH*VFjedSwM72)ih0r.X-NCQ2:@kx2J.4rI`9ikGm?{5@J1Qjf' );
define( 'SECURE_AUTH_SALT', '-6fb<l<g, )/D{otwRy?Sxe_z5IwBM`, #y.r)Hc>&EY!uyP|SnMpq{?Q>olMzj@' );
define( 'LOGGED_IN_SALT',   'k~T:Cb K&s0@s#z3kY -S`t+b2$*RKF$q2mnBM)?S:TD^46O.=R%eog#e8,gJFEt' );
define( 'NONCE_SALT',       'yBy.E2;RmAgbhje}Og1m~qKcX]3YET4l<ODZ^4&4xHsFP-+E22>lFqBJsl8FmGU_' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
