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
define( 'DB_NAME', 'wp_projet_db' );

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
define( 'AUTH_KEY',         'lF$4Ww?Ow:;tVuE#J?gLh$q26^1QC^1uL|F,+Pt2Y1)X#DkDk/q^}qc1K-bZurk`' );
define( 'SECURE_AUTH_KEY',  'fj3=|~}=5rE8q}2G~3*Z8~o@N$3,iV/>TjC@,_vevO8YC&NHpRLKxjB]mGgTosnL' );
define( 'LOGGED_IN_KEY',    'hgO/zX98`))m1ebg23W&M*v$`4xg+bEUV!eCr@h/JK2{SHvWQkUB~#VIl/K+;|8.' );
define( 'NONCE_KEY',        '?4kO yUv|t+^G0l!~7>;EiGv=[f;*6H`[/,7F(cTns.7d<#e^L2^]2ycxt>m;EL8' );
define( 'AUTH_SALT',        '5XO~bvCVj=p  gWz>RTwhhcM=*]`bvJG[1Knv{2_QIwQOV9gP$!s;f/W<}%Dtd-l' );
define( 'SECURE_AUTH_SALT', '@DJCG#^~M-^L]pX9hGch)[/I((eH]fv3X|PQ/W`Om%}Buo(eF<rg+|Z(,y*5PZh}' );
define( 'LOGGED_IN_SALT',   '7*+PNux (OJ_HbRW? !A=R>LtOzWQ7J64W{pd+!9L&c1>[F=tBu5.va$q799)gJ<' );
define( 'NONCE_SALT',       'WUBCiU]X!4OEMB_c& o}vfu_fNW ghp!}f3QVqA6h&V8 ^TjjfxdbN<U( *s5umF' );

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
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define('JWT_AUTH_SECRET_KEY', '+74tL9 bz@7rOB2TVM%VEW,-hbq3/+`HVbzD}riN?7sOXzQEl}|;KtOmx/<O)AM|');
define('JWT_AUTH_CORS_ENABLE', true);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
