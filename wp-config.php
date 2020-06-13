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
define( 'DB_NAME', 'fusionandcreation' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ';B|&==5,DW/FGE>0Bq,^fftFNY;B%8c4gr)@cJx#xZW,`=m/7fHQcI?dsz1Afv:<' );
define( 'SECURE_AUTH_KEY',  'GsgTw/lfL)w]Dge]lx~&a n<wYr/5~1R5.$-V<-kw;0H8%c.FIxHc+BjQ#b&(*rD' );
define( 'LOGGED_IN_KEY',    '93iCST^}@3U*e-[c|(K.GFvz=(e5(=hH(}+qiF#jq@e4 m=7gc%maPY/pa/DtN]Q' );
define( 'NONCE_KEY',        'Y&R%*mwnuK:=QgL(4!A8B_xP}#N/@sZ+@tlrB$m=D0YVEgPLbg(53MNgdV,:{YCG' );
define( 'AUTH_SALT',        ' ~B|`r^1z.Ci/WaA~&V;2HCq#c)nyD{OoEF+aoK^5l:DK0[lrvK@-f:5/@7)gMBX' );
define( 'SECURE_AUTH_SALT', '&aszT{c2i7#/0Sf=<OJ3bQlo$&UFrh{H,B4iS];>^L~I:5yKVa{&C]>1z]>gW&Am' );
define( 'LOGGED_IN_SALT',   '>dm<n_l*F;A]So^=5,y925U|{}6eSZ<<=Hhh- 2i&S;cba3/Lio,l@O?L=Y]Efgx' );
define( 'NONCE_SALT',       ':r~sg5X+{Jni~$K8*/J^89s|U(*Wth.X--g.+rDu9[mIidAD~R_}=*3NTlxa?]a`' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
