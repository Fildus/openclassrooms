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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/devfouovja/www/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'devfouovja007008');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'devfouovja007008');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 't4yTayr5E46N');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'devfouovja007008.mysql.db');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'DC{5mQ:d <wt*`}G?_Fiy{VwZs5NM+/#3]K6q1518m;^di(zv>V!HR-^4m[hwG8b');
define('SECURE_AUTH_KEY',  '2]D&2eQqfL;:Uav2Ss?dg$HS2)`N{3R;r-^nnLvSoGS7dHs0I+cZTY<KiRa~ |L;');
define('LOGGED_IN_KEY',    'I2k&BE#`NyG]zP$cO0jG`%E/(&kiseF=r{FR::8]#6wrpGg}imih R1s(?V&1[*x');
define('NONCE_KEY',        'TsBqk/l-8jaTf46:[UI xv9ZX3GCu-r}-#~.b0C{(O##4.}Z>G#`RM9bmFwsH*Q,');
define('AUTH_SALT',        'P{[W~@Y3[KgcA,-TFUM3lJ!IUjE~n0zq5@P_jNB$Ta_Zsc;qe|NN>lLvfMdoq1^ ');
define('SECURE_AUTH_SALT', '(9fPK#} D`bN62a%PO%C;8.c?YVE7,#NPSqXce_/I1O;rxt2]?j*/p,WWd#OrR2:');
define('LOGGED_IN_SALT',   '0UH^-<qb5kM;TKNeB_(ggTGlto{+Hhn7I.[}:1&#lazB-oHq%HD8?un/Uzpp<)UV');
define('NONCE_SALT',       'D^}9l,-}.7/<cC[qkwso~z6[onw>L$76,r`:Ns>5X998pN%zLlP(_%ROpaZVqgDJ');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

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

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');