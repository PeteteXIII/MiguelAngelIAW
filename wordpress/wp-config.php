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
define( 'DB_NAME', 'wordpress_db' );

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
define( 'AUTH_KEY',         'f4B/c?!ZP+>A+aZ+6[f}K7`2+E)X8tnmMk>B=:L*IF+9{%>|Uy}5fZV]tNXt<KTO' );
define( 'SECURE_AUTH_KEY',  '3Usumj}@[OtaTmHaXpX}udRdaW,5nJf^iS+(lh14O=YYc7ybYvl_d,?#wmcZg}&?' );
define( 'LOGGED_IN_KEY',    'kN)u##L|D<Ox4*>%ZL?*`-YWZUKG)/4&1p&Ia?Wv[8QPjw25!}W,5,@fm%WUq_!d' );
define( 'NONCE_KEY',        'CLW^oqzZSj8ifCjuuT9k/vH%Z:4j)E[^oF<aOSf,;D-`HFnKD_XlQYnVaN xbX .' );
define( 'AUTH_SALT',        'U-Uyf`D~i-}-Q)KFV_8Z~2EmCqyX|}<ziBVudU:n[xBC552s`>1(O6kuX4$APUT&' );
define( 'SECURE_AUTH_SALT', 'V,hZNhQm/M5Q0%OTmc+@nd<F<gL`vA5Hg;3;ZYKT_>$DhFWx/yB4r[#d;Zi`u~&,' );
define( 'LOGGED_IN_SALT',   'ULv/)^{d+k*[W-;Df]HYUKeScjUs+VA%(Ld>D=)sly!MVOwfC%S:yCv@1)sm>]gK' );
define( 'NONCE_SALT',       '$Peq]HtB1q&{Z`lKjgkhT>}UtbHRe-SkMa#cYRPw-`Q#~Uj5>o~3hnwGuyWf!+# ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
