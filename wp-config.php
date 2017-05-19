<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'vialoja_lojavirtual');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '123456');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'TMHwEfM0Yoec2B[UQzhMlGQL/7kPh#oIn~.}rHc*=Y8<.|kBQ{q`>eD_wY,7U/6B');
define('SECURE_AUTH_KEY',  'EH;[&GSIP]^{.2=>)MW^A(CxnbE8MurKG>/ZT8ro&v&=AfLX]N*Q:-D2*TIg9UOU');
define('LOGGED_IN_KEY',    'dAz<ByssyT,xAt45a5Z=O:b49[fE4H0;TH7Ngon82h[p?DiLt7.<o0s`zz?pR|Oy');
define('NONCE_KEY',        'bh*[E:Qz,&pWwA7$L5`-K-Pa>}u|cNgA)3).c}`ClgF:.tZkTI$9xYRu1<%$@/cf');
define('AUTH_SALT',        'n/i!aanez=@CxTha[(EmK2w6beeJQlqAa&IMd<ySd_]gk?XsapF(dD{t*#fIk0/Z');
define('SECURE_AUTH_SALT', '6Gusyl#d1w|sMIEZe.Sux?1MC;$UB}3 b+p2k4yMhjr[/o9DAcM2r?X.(FaF:w`S');
define('LOGGED_IN_SALT',   '_$/=C(:?D!HDW]QHbs)Vu&`T kgv-rOI),vDzY@5!sYju9*GK4%;kQrYRySW*G!&');
define('NONCE_SALT',       'rDSX[f0,|uOQL<v0&J2tN^J(B)u^O]=v{DrC.:dh;HZe.j.&F?nq;&81-9:t3a)w');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
