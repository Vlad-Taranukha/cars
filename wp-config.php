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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cars' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '6m^qsV95$sZ7F+G0XV.>vdgXug4esrt-npZoefRO _F~}n3#f{|~Sz>Nxo+JxC9<' );
define( 'SECURE_AUTH_KEY',  'T1@LtrTS{MZgOR/^n]8 |RHRi481-9lLD1as5}SBq/RQg/`:Tt**|t`Yq:Oq)|?L' );
define( 'LOGGED_IN_KEY',    '%^(tLD7=&evH`J1^q7(A.3HEcvUUvub8&761,P)!pC%Ws>fy9vu#oVe#!)twuCo8' );
define( 'NONCE_KEY',        'y(I1%99 72NLhG9<G[~Hn,2~/x5+su$6gj9eJtP  )3<5zLa9Vw_#K8i^>gogZ?2' );
define( 'AUTH_SALT',        '}Y9xJW{8Mp%6c5`Du23QPb44Z_e^>>9}BQ>A-)BD@BEqD<1R9[T$&pVHqSPd!{U/' );
define( 'SECURE_AUTH_SALT', '.Pos:$Ih7@JL:tm;Ca7cToSzCL =Z/GG3o*n5I9n-:JPraJ?)=~.2&K9eDFA3LDZ' );
define( 'LOGGED_IN_SALT',   '25.#3R@D|A8i-rzB~O1gNdPD~f#{7[)i?}.[%wI7lXnCDE=xm&X;QvERfr@LdlJz' );
define( 'NONCE_SALT',       ' mhQ7{K:Al3k-|=Cz 03y]Uasp(zc$6FZ0<V<)`v`lY)l8kd$(z{&VaM;r%1&PCD' );

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
