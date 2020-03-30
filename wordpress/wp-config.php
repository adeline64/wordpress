<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'toto' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'C4yd](|[&ZyLty-/jhc/&95z<l1Was$j>*Z:YR7Zw!LhY:#uqRcx9>o{Ct2@=10Y' );
define( 'SECURE_AUTH_KEY',  '5aArx7bDEUhNHqPxB_F3r/ZYYOjfl^d82^<t1h_l}</xy]eA]E6WB3?P}0V]OeU{' );
define( 'LOGGED_IN_KEY',    'f:xF7pogE2w*]Y&wHcW=C:jO,%-Kl<q5RpNMlcvYtv(^*3@,UHcbqJffWsxC.i|)' );
define( 'NONCE_KEY',        'ymUdtfJdp9V7BhBX%*wDOeHvep%kwLB]@XUvdnO=GTYveek35 K4@jP=Z^Ov=Noi' );
define( 'AUTH_SALT',        '>8{EhooE~?/>WYbUZ;AZo?=Y4Y|V9#xl)A6n!?(XvgB=0GuhM{0au#1aS|q/9O~a' );
define( 'SECURE_AUTH_SALT', '2$vGAz-lTtfAYhp43.0U/bOzQgq@+|xoZoRZ0*%@C!{doK`]4_T:]P|b.&d|$PR;' );
define( 'LOGGED_IN_SALT',   '`*oS:ku4kg97222r`@)H:.1oLMzsrQt*K0!s0JbU[I%RcG?DU5[t+31+^3BdBW/T' );
define( 'NONCE_SALT',       '*Fv&P?sDoUEB&`KHAEW/(B-Km/D[zD/Bn+Vwfd26nKF&{!W&fMIpL:m, Q9YCV&_' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
