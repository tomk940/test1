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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3Iizv+TgUXD8jwariRqIpqvxbqBSHBcRLl0OXIW2S8wbcqv1vzjovVqTAdY2P5gjsrbyW1CNcDee5GWtgaRCmg==');
define('SECURE_AUTH_KEY',  'Y1WazE1wJffkk8gpOzaEnUN5IE9Zlv/hgKIFhz3sLKaAsD/s76enQtCivqjBJZJBGNH5l+G3gc7dpzYaw55FbQ==');
define('LOGGED_IN_KEY',    '0hG70UaQLsnQXyE/ZmUUiVKjhZHQdGjF4ZbUEewJ7WTdR5RjC+qBXpitAosDA+T8O6Y+NdSFftUum5fOuzV/hw==');
define('NONCE_KEY',        'gJ0QVzTsf2ZAMjGU8VO93XtOm2U0mZGf9Gv8VBarMc1A1Js4VQ/SQtTbYxLsBbQSr7JwpbQMR1/sQl1aElr+sQ==');
define('AUTH_SALT',        'SSzC6vGknbstxCTmG1t4a03rJDz+PvGnfmg4C70wPvRVy00mLl2IpAcZwhSdAgkKq6B5RWh8ty/6/ss9kAVVjw==');
define('SECURE_AUTH_SALT', 'OWSjo+kH5HIeAVYuxicS9SuGX1dZHYi/9M5Q2zF0yPbcWZ7PXD6bU99J1XBk/ytvAdcbJooaPemOM1RdXm4H9Q==');
define('LOGGED_IN_SALT',   'd8RVlR/yjGLH2PvApJxhdGEJM3WXGdRfnZ4L56o6B3WSa6mgxyGcDJ91tSj3ofMnxgBI4y30mZD9fKPf9n/KaA==');
define('NONCE_SALT',       'M/Yp1BGsslgCjygccPfjhDZQQX9+Q5W16Bf4P5IIoO3Pha6wIsG6o9pwwbdlb2vlrPuiOSHm5JuX6KMDciX+lA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
