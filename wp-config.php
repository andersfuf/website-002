<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lassena_dk');

/** MySQL database username */
define('DB_USER', 'lassena_dk');

/** MySQL database password */
define('DB_PASSWORD', 'LLewddku');

/** MySQL hostname */
define('DB_HOST', 'lassena.dk.mysql');

/** Database Charset to use in creating database tables. */
#define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'L*D4rz+1%#u*-ScOu.p9fKM*@6Y]iqOeBC}@BpD*.*hkoE%0M%OLUanCOyQM}cREH');
define('SECURE_AUTH_KEY',  'hCDfJZ*lnDl%pk?Te%nILA{[)qjszUQAIm4*BpnNA)pkBwo.O0f97Iw(%vUMIX0.{');
define('LOGGED_IN_KEY',    'm#p#K*mpOZTyY[Wx]/YaDP?#RO9jpPb!fTh6q7iQzm#H{Yy#jC3x,2WQhBMkY2is3');
define('NONCE_KEY',        'zYEDS?tLpuet4T7lEWqkv/SfCV]VPQGwddq#ID&xmQBtjIKXxbpzF?yuBEppAOp8!');
define('AUTH_SALT',        'bOD.W)hGe3uSBt5d4)!;SnEfoVS.pbBftloBkE*.tXP[uF.H-bbOGUQ4ht82uPcmc');
define('SECURE_AUTH_SALT', 'msOr[EpcI+fpre5JzKSlW@;Syj7KRKi[FrIvK/tLx4.NJHlY[1Ckh+[P8ISD3mzdd');
define('LOGGED_IN_SALT',   'peWA+?dfz78U)Uo%647Stp+;d@}I2Akw.r]TRObd;QOtu9k-li2JE}&7ZO*WD)PAO');
define('NONCE_SALT',       '4h+VQ]5SWw2W[UOPPPS1f)stWQzfPBe}K.EdcHSKcZzQ2B#eVpC3utA)S8zEA&utz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'meyer0_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'da_DK');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/** 
 *Prevent file editing from wp-admin
 *Just set to false if you want to edit templates and plugins from wp-admin  
 */
define('DISALLOW_FILE_EDIT', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');