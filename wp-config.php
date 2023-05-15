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
define( 'DB_NAME', 'nicolew' );

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
define( 'AUTH_KEY',         ';c@prXy`L9~v~)5V^}a>[Bo}aKl/P.sFB&.6~faL7+Rkp0GF)Z}NTz-`O^z2ITF=' );
define( 'SECURE_AUTH_KEY',  'YVi}|5B2l,nPz+bfd,3,B3Sy<z^v%Iz2-q+O/CJf597gCG)=74tq{UeF!XLs-8hn' );
define( 'LOGGED_IN_KEY',    '`[Q88( 4{k ZolMz-7j;(=X3$|eeX&nBG(Ep&/* 9EGc>Kdnh>(3Wd_dXT:B2i&>' );
define( 'NONCE_KEY',        '0VK*UtkL:iFo8=gy7<.DA8|bw0Vn;sQYn<i2TgFafwP/Q326B+1q]<eRr!MfT`V*' );
define( 'AUTH_SALT',        'U_eWe*3JbREpaZFE:>-x%M&iS@[jtm4?;L`PcMi>Wrk``qQT%2t$~sccMGz.o,jS' );
define( 'SECURE_AUTH_SALT', 'ZQcaT|zhO&h3~&7PjvN6lp5h5q_Pj*Dc~+n[]DLhJdT(GW4a<OD%)K5N*bh^*vd4' );
define( 'LOGGED_IN_SALT',   'nsUbk>OIHJ2L*yU)Lv6eYrcjk#}A&YcY(6i+v%l`dGX$Tpb7wa,h.sHNaY~r&!FD' );
define( 'NONCE_SALT',       '=pj~?GE3T*!381w6/;$I{HzYCof+34_XPb+cu?!}iuyC8A;zK^`J%|Wl[v}tBBGP' );

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
