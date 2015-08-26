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
define('DB_NAME', 'al2scom_site');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'al2scom_site');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'al2ss102030');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'wx;^?mzP?Us]1>UBf.x})fM6/BwM&oi;vpnn22y:=8SmJ8!hWKKmcAc=[]l9]#1G');
define('SECURE_AUTH_KEY',  '`<*p5UifMm)P~ZT zYLM{wH`TL+aAjLP/!4QS{Y+*WV+1Y!Kps/dJ6;|n8~hy-Pu');
define('LOGGED_IN_KEY',    'ynK5b]O1Q-+#I;xsy;Py[FC-uP|mA3rMaS*tk8%cGp!K<!!-toP}r15Dbaeg*s9n');
define('NONCE_KEY',        'Ug,5}/_QQ&|f7ky@L^4nS3YdwwIrs}tvh=!FHyu41RA+[PLgZc?53ca/Z{*|Ao(Q');
define('AUTH_SALT',        '-6YM`]>rtk-v`/VI4*./MhRPgr>t@%!Ux5qNCc;M~pR1qQt~e3OC fa.YZuj&5z%');
define('SECURE_AUTH_SALT', '+L2WHiH~i2kGl#LGyMUM|OSk$SU;&%|Ysm|j~i+zo%[.LD3+LS|e~0A4rF2[sb:?');
define('LOGGED_IN_SALT',   ';:8gJDga5#+x&BY9~&;>E(C3&0lI]Z+1!ZD{S20^1qjN=$+p~>T ``+{7c30b.N(');
define('NONCE_SALT',       '/|8SgO~1tOm.n>3]NNtIOogy)$Joj5~#QF|S``q4{F-Yx *3!xc.-||uSuUu(*_?');

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
