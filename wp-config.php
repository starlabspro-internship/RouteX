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
define( 'DB_NAME', 'RouteX' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'KmYfDeovPu98atfXe5OrunfZKwFKUbMU2XJhPv8C86K81X95DRGs6p53o5ggWfi5' );
define( 'SECURE_AUTH_KEY',  'gpfjJoNt0nQPvNrV2nyYX39wk10LN56fNF1bBj9N7Ez4h8JTKMr1S6OpjBsxPIsK' );
define( 'LOGGED_IN_KEY',    'F807eYPAgC10LfHo2372ObEDeVuuR0IGUqt3Nlnv5MjHSePe7hCE2jOmfoaFXh7V' );
define( 'NONCE_KEY',        'Igem79y9uFo1diSYtffQLHwJEIemsumlHndIh7FJ6q1leoj50DohkahKlgTow2Qh' );
define( 'AUTH_SALT',        'Vs0ts9xgzYCHcrfKltLQ4EGjesV5jSCd9GWXrszQXYWhZr7RSSVRPB7fWC5uz8MA' );
define( 'SECURE_AUTH_SALT', 'SyhhnELrV3gGGPfu3ryISzXrOtlG38UvtDyz6l8RT7oVLQWv8u1RcLsfsm7y7z1X' );
define( 'LOGGED_IN_SALT',   'LsMGJajttMzqYMi1pAx2HMdtIQeBlsv9L6eEii7LK790meY6te4IAApbBo6Kir6Y' );
define( 'NONCE_SALT',       'wXoGOhz3dDkmqsDo7uE6Ui15GPbo3rnRa4VNYj3jw9LjuJcYf4e8CtD5wSfEXAet' );

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
