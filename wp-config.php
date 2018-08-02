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
 * @package WordPress1vOI7gl=nQ*%cyu=KJT=-7}V+60i5QAk
 */


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'companycam2');

/** MySQL database username */
define('DB_USER', 'companycam2dbuser');

/** MySQL database password */
define('DB_PASSWORD', 'ap4@Z-K=?a@XT6uF1~+#XPesOKSGY=0e');

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
define('AUTH_KEY',         'qtLC-pho$^/]%@3o.cJt+uw,$;ZG+[]i&MT$E1~JI?tp0%].36b)G@ouPzl~-*@D');
define('SECURE_AUTH_KEY',  'RNc[O&@i-YC2o{C:HKxX^ M`CQ% inyPL$6l9ce237=;Q> 8dhvE-YBKZz`1yDfe');
define('LOGGED_IN_KEY',    '?X+,pdWyXiq|0#+ExUT)#8)D,`j0pGm(SbDKjepEqc98hnM=bB.2(aOWL(KUwr:?');
define('NONCE_KEY',        'P}Xd:h0$}Fxkstclq:<jnxY&8Ryx%0T).vr[I@[ib}9ge!wcRoJk$5<OcF:vDe,s');
define('AUTH_SALT',        'DwVvB;Hk@et_a2ovuZePoD<21i%V/ucG,[FPfw|_id.a>L)]4wvUXWKET&KczqNo');
define('SECURE_AUTH_SALT', 'HnZ3_S/Qc+kg`,S[RP_gGZ2/PCIH66+<*}AQlL]30muDga@}l1069LFX3b9oE.2w');
define('LOGGED_IN_SALT',   'E+0F.D$XFic4dqH9WhfAV~z_P~w2*rGv(!^dqzB) #LNdR0|ck+m}l7(2>8hnxDV');
define('NONCE_SALT',       '?mA4j-+XHxwtt/5!*7FD<ihv00vhCH^U}3vnG1`<y?}#{3u?lF>c );Py-~Mzv)g');

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
