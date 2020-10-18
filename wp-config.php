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
define( 'DB_NAME', 'zabaganka' );

/** MySQL database username */
define( 'DB_USER', 'zabaganka' );

/** MySQL database password */
define( 'DB_PASSWORD', 'zabaganka' );

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
define( 'AUTH_KEY',         'F++Pg.O2t>t;~>^+sp+0IHoH#otd)W58/GG^csES[{*tD2#.[[(jsIC<cG~KwII@' );
define( 'SECURE_AUTH_KEY',  ' M=pc#POiO4F*Br<[MGRB;6@P2%$Vcs.*a5(]q!c`R~F!4D2@|ZL.eG=YGOva&|r' );
define( 'LOGGED_IN_KEY',    '{wE$7Zsc0Z4cft1mjk8y+(1?[L~-ikOO*QXBPdT,kQuPE/oH3?$:^pFdm-6w D0t' );
define( 'NONCE_KEY',        'm7=H$nG0C`XCFGckSQ%QOl6vitNqc2]ZsqY$r)a%_OIR->2_:w+?}I-&Cct]@-n?' );
define( 'AUTH_SALT',        '?jq)X1w.]{=!VCqp/KY1&JL`=E&5y8(qmzq(!hF5uG2)Aej}g7$[xqmW[MfG:rQ{' );
define( 'SECURE_AUTH_SALT', 'Ih]wR45[mkR3i8sT$4(BNtc052.V;@ A;EEI+rwJN{CGyw=Jsy[z.2PtF/,Ev!U1' );
define( 'LOGGED_IN_SALT',   '?DWVNG+7`lvw*XAwU[sfpZ;53T[B_&AdPG/Hs#ANBEBt+UF=~TIE]i%MjV( <v7O' );
define( 'NONCE_SALT',       'vO@V)KF#jh;y+6VMV$@2s`+@3/B#[Z-:YFALwpV4V5--i$vBf?4Oxaa)XN@+x@,W' );

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
