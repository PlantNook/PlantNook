<?php
define( 'WP_CACHE', true );
if ( ! defined( 'FS_METHOD' ) ) define( 'FS_METHOD', 'direct' );
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
define( 'DB_NAME', 'plantnook' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'PlantNook@432!%#' );

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
define( 'AUTH_KEY',         'j=zV<:fhNh?Pj:iVhyG]%[[augLV1g6*OT@y8rwTrX !MeL7E4!>,9Cr>.fl-eei' );
define( 'SECURE_AUTH_KEY',  'g)bfm#~fK)X!Q{wy(i;cmbIj k#mZp@Wk we3s}U9dTUM_V0mi.TPG/p!@S)IxJ*' );
define( 'LOGGED_IN_KEY',    '# qivdGJOrbm2Y##dCbvY+9L(.8X9G,!)~@>w_B.D_1~-oB+GY<Vecs#eu@FL$=3' );
define( 'NONCE_KEY',        'juAtZwIi0km+LBA>A@;3DU[h@{!0:#[,3@sJG}h4OGg}(RE.B`WeF+)Qb).kT.SS' );
define( 'AUTH_SALT',        'Ck1Zsel}Y1ppz0D2 oyHD3|%~f:k3[2+wvDqr.GY6JamM_dkU!fh7gpRQL2.Zt5P' );
define( 'SECURE_AUTH_SALT', 'm9/6=lDJ-ss3@Ta47RIPLOs~prcxBbu#.3DV75i_(|uJ~L#pjp>o8>})+ul4S)hr' );
define( 'LOGGED_IN_SALT',   'NU;F~3I8%;K|[?A?h%Pe`nl>t8aYS8;eegqt}m73Tv@~+BC)ewkLG5nBY3$L;!^h' );
define( 'NONCE_SALT',       'l3&4gZ<!ILU3HxgN&.isDIhb9#Q0>1AwY@|$I1N#h$J*{ObEMg)eOR+O.,-(!l|s' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pn_';

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
