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
define( 'DB_NAME', 'sam_ipswichbuildingandpestinspections' );

/** MySQL database username */
define( 'DB_USER', 'sam_dev' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S/852*963.' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'U[,~|GW{WF|mpXV@B[Sff/l>_PiZP`7mjV|$H/V|I>:T9sN~6aLUDH1aLZ}#o|te');
define('SECURE_AUTH_KEY',  '=d/e_L3tC4~AABaz}Xp/*lQ-vyTO6=gooC1}-o9[L#OiSv++SirI2HE51CT;XRww');
define('LOGGED_IN_KEY',    ')LXQ3|TtRBbsb%T*CP|EYr3kytC +lc,vzE4-:lH|v2> }3v(wNj*$2XEy4aH-/4');
define('NONCE_KEY',        'k[l|$X~zqMP&4J0K6K3?,dKX)I!9FSqJI-x;Znet0[&Lv_FlC]3Q+*<;qq4T(K]f');
define('AUTH_SALT',        'S>a-fW9_0orm_KP(EPs,5neyC<[ Op`V;Y&?FD/m.B?#z0~pU9lOs4 SM&Q6nkiD');
define('SECURE_AUTH_SALT', '<^-{PW{4MKAkEmjE#A5}:Oc4p|lV~>puj9E?&~2Io2F|Iu:GHvaGUKeu{}``pn{:');
define('LOGGED_IN_SALT',   'V|N0H9c|LPbeN?];LNypKi?=uq$ERS^VB7z>DfOwK=SD8?+iC$3OXI1F^3T{}@t`');
define('NONCE_SALT',       'rOUu i?+HZ1wW=!>Gfm4&zK?Q8ih-4_C}-XrCB;IGVuE5X]1R47m9EZu-zxJec2=');



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
