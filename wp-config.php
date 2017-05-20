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
define('DB_NAME', 'phamexco');

/** MySQL database username */
define('DB_USER', 'homestead');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'jR|HA9L|K|#x>#1ZwV8HV39@1F6X<wq2Db*~/ni&$cLa^z3QfU|RXyhh}!~Z:3/D');
define('SECURE_AUTH_KEY',  'g*g>Nb{g?~{0c9}O=N0%8!%>e9z~cb!BN;rgu(gx!f7i_EiXtyv+anK,74Nt?YXf');
define('LOGGED_IN_KEY',    'Y}8FPxr<50B;[!&ql(&o,:E$?,)xZ}mu#K$89x+`?veeLn*#]Bt:SU0hK7.fmKn4');
define('NONCE_KEY',        'zWj|6IDN=h2fLrlh|}|!?rf)OtP@MXVik]|Y;V )MyQsys*Z^N 7Z{6S>j]0K;vS');
define('AUTH_SALT',        '}lmD1eSqTO6pYbCsL7*gVx<!j0U_Fa18=W O#$?)nb69K8&b~lD~BiFT|rN9K%G?');
define('SECURE_AUTH_SALT', '`M3y4enw8mg>h`+f:637jWK{]&tpayVEI!Tf..=)L/s:rv6@:VR#7[_mR*TQa2d>');
define('LOGGED_IN_SALT',   '@S<d`:p{%+5h(um>IrL>iGmXV>k*m$B>:7;*-PH8{xk~,x<nR1g4(_%7e&L}BN{4');
define('NONCE_SALT',       'b3<DI[P2{IH8lZL-8={Wl+100ybOn6L<R8f>uNp`2vz?+!/rp@+TVkU )N%}d(.7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
