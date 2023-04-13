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
define( 'DB_NAME', 'plugin-wp' );

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
define( 'AUTH_KEY',         '-zf^9Z8(PRF8I{cbp0vd~r0Gz_|{5D|-&G7Tkzw9-+UZH4V7w14q/X5TsHofd3/2' );
define( 'SECURE_AUTH_KEY',  'zdHDFZ)~J@R[iRZN@P+uEf5a,hOzslSJv7q#$t`nusUYx$uXz4PWjF=ye`tVXruX' );
define( 'LOGGED_IN_KEY',    'W8jnh);+|i<U)e]QEy@Hw;1RZ)pM@)McaW+B|bw4z.V$yO~V}lIyI|N$_0;p<V7,' );
define( 'NONCE_KEY',        '7Cd8n7gaRj?f?K@[@LKwq5hB?)F7fx^Z<%ynR>+Bg#EoPP]knSw7^,jCe1X}o<hZ' );
define( 'AUTH_SALT',        '7!kEVzgtds~^CdOuTLhw2{!+0=bcS/IeiS!|6^Y7^3RYTz@<-e)=T^E|H?mi?azf' );
define( 'SECURE_AUTH_SALT', '<[>`e-_&l3}`V&:]S /$Vale,oH)5.<_XDgj~}]x?-_)(w*wCH8j%`-NBVO[426d' );
define( 'LOGGED_IN_SALT',   'Uh,c+v[;4,6f5 0au5yClj;RO2~YwWZy 1gL.e7}vET1Hgn?Yjo[U7d/?5cBvR/7' );
define( 'NONCE_SALT',       '>vbTI+7BN3R>oF%PVQGZn{X&S>duR;<r89&??mAwo5aizs4kllcHAzD:9^Xt](+5' );

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
