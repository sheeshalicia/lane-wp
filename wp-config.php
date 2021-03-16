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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lane' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '=608hzao<ndagv|%d<72rk4#Bks^:Vl:azN;,Xl$+!ow1_|F=9a;a+C6t%4CtaqC' );
define( 'SECURE_AUTH_KEY',  'dhT4>a/nflr)/whg_wHM~GuEI_T_v{%FI$c4JhuTH]!igjeRvu&zXmE<6s!^5d3L' );
define( 'LOGGED_IN_KEY',    ' #G&YWBEQ{ 8~>$?2?=_cRLDkvMP/5+b#.=tu}2--Ad+7J-u_;=kE}WIP?eM[MYz' );
define( 'NONCE_KEY',        'd^S=?R@0h>`moG<_N[n3)B2?qy7[pZ~2-<c^SV}5wN62/L1<NV,JnGfKy1_8-/]v' );
define( 'AUTH_SALT',        '?&Z1e4pgx}s=*NA{[XQFiZA_hsO]nbp~`M>W7F.8zYhUz}*QMWCkD/|54c^40NBX' );
define( 'SECURE_AUTH_SALT', 'K^$[~_L,T)PWP`KJ1(%oHtU=e&|>.UCvhm,f-cQT(;ZK`NfO*6r(iq:|I;[ha!._' );
define( 'LOGGED_IN_SALT',   '~|!Ug:d3E39&sV8ln_%c<P5C2|qCm42prN/g{*+>o_%1cs w%~YUj@H}LsT($y5N' );
define( 'NONCE_SALT',       'fD^5W~ ]&qXx@Knh5fhZ~0ReUS`,#~JY)60fKBC|rM!t58x27[II,UD]]q}AE`=|' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
