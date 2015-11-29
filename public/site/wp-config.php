<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'academia_site');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':c|R>S}$|&~/IjX}/iu1:)&#i#LUoAf!UR&5+^pj%8kB5nKW33-!As-DN,Xjs!^%');
define('SECURE_AUTH_KEY',  'Hbm*/|q+MJ-)`a/+U-?r:X8?SOqkn+V&.4^bDGozwhvC00S*x0<=D!K8{RSY9U*y');
define('LOGGED_IN_KEY',    'KRw*i3&l/2==:J|VbD!#X16/`S)fHZ5|LtOp+-H4&eZ+9W4ZBP|1yNcJ#?aF5Zc!');
define('NONCE_KEY',        'sR;:Z!D/a]iFGRr*0ulFL~|KzxR[>Sw+)z/5MX-f!:  +9+aA`A`,B:u}CC8#&gR');
define('AUTH_SALT',        'M48>/WR}Fbfi$YD ;)H0I{JsIU(5Q>NguQRxvA#V;%T4;SMNr2AbnFa.+bQ|+6+Q');
define('SECURE_AUTH_SALT', 'Q+4-}K@APdVzwW{1Igd~Uf>+52wRS,OSq%U {o_`1=v$:X|aHlkvO9B8wp^lG2R(');
define('LOGGED_IN_SALT',   '[X[W6/d5d(NmYvMXP4o^+#-([b:$22Ji%/+9qKgYz*|jeyPFGQutu>lY`xpHZ5{a');
define('NONCE_SALT',       ' f/i|~Bq1d++o_:?B+)Fh=g%Ji(mV&!xmBT#8XWum3;A6@E0r&#e0-)a/8lSP|g6');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
