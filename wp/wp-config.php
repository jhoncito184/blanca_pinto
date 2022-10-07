<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blanca_pinto' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '(RbAF|Ra%8%[*3me)2B9.KcOSW Up1Se&r`#kYb9MA&5+T[:[7^GwlfB7(uokg<o' );
define( 'SECURE_AUTH_KEY',  'B=RVDWHqNKfTV(ApBgQPw%MG q?^~T3ZM9zoN8is36|9Y|a.UTcgx:V|AfwqaCYE' );
define( 'LOGGED_IN_KEY',    '! eca/%[^ jU]tSgU6e#Qsw1/mt<9W{:y[gn6Gv:ER4)b|;E>Rf(1g| ac5M*{4^' );
define( 'NONCE_KEY',        '9-n1,_]P?9s*(q{ZQsDl#>QP6qdv3^x01FG*v,;;6y`[e-eLY=0oM{NX)B=~@_jb' );
define( 'AUTH_SALT',        'MAM(@N;C.yZI[^{yq:v@@ l|j=4L*>V--r4ROig2[*em]t!9&g)O!yIysk`eE:9s' );
define( 'SECURE_AUTH_SALT', 'ry}8hkpVz_reD}=u0=a_xn@(,Wu;`VG>q4TYTO>t&2<=o7pKHf%(6V@vu;xq$l<d' );
define( 'LOGGED_IN_SALT',   'pZv(eUM`wqa-xmL>u|213=`o9uskIq1cyWIp/3`MDO1mK_pa[Z39S>r;&P#e]NNM' );
define( 'NONCE_SALT',       '?Ow;yYN;#PQ$*eCNk<^s<Cj^CMIy8!9l1ErV{4b9SN7uK.L0)M6;-[&{L=0FhBEg' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
