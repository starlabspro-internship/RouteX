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
define( 'DB_NAME', 'routex_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define( 'AUTH_KEY',         'NW:W=%xQLQ&&rSmXb*)U4#,!?T~6g[8}YwhgZ1*stm@`8UVrfJvOF}$X{]*;z^R^' );
define( 'SECURE_AUTH_KEY',  ')X{DEjk%?Ta:v[b+UCFA9s7p%:}@$s{GbWTN3}&agC-uhSj=:PJv<$Z=^h{NsQoq' );
define( 'LOGGED_IN_KEY',    'Y49ZhG{qf)e:mmeMRux8<Yn#geJDfHQzztSSf&I|Zs;S* Sg&gPv9377L#LbPL$R' );
define( 'NONCE_KEY',        '+U?8p/,nEAJ>~J*,Q6PW9:I8To2)uS&Bdw$`6FD5yQ4^i$&>,5c~Q.zPx`ejK]GU' );
define( 'AUTH_SALT',        '_r/R {7qn{UFhxcPZ]8JrU*4BTe2/fueERtj#h*,ar>[P5c`xlB]sobj~,*PrlP2' );
define( 'SECURE_AUTH_SALT', '3z&b*Q8yQ?m<6*!ENN(=@f;07Pvwrwz?!YYG)FFe D)}ICR;&>^iFhDe}zuY70n1' );
define( 'LOGGED_IN_SALT',   'Raj$4!@]z5YA8[EA d8RM.5A%4XU?7@h$a1yg@x~u6s8dfV:B_!>y_ppYR685l91' );
define( 'NONCE_SALT',       ',:8o5jZ+CGCvUAR9=[8<t&3uzIIC1Lfo&8(l%jfIA25V]M=0}Wd@EIp0jcu)74c5' );

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
