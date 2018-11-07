<?php
$base = explode('/', $_SERVER['PHP_SELF']);
define("BASE", "http://".$_SERVER['HTTP_HOST']."/".$base[1]);
global $config;
$config = array();

//Se ambiente for de desenvolvimento, usar configurações para dev, senão usar configurações de produção
if(file_exists('env.php')) {
	require_once 'env.php';
	if(ENVIRONMENT == 'development') {
		$config['driver'] = 'mysql';
		$config['dbname'] = 'gbriopreto';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = 'toor';
		$config['charset'] = 'utf8mb4';
		$config['collation'] = 'utf8mb4_general_ci';
		$config['prefix'] = '';
	}
//inserir env.php no .gitignore e não subir este arquivo para o servidor de produção para usar as seguintes configurações
} else {
	$config['driver'] = '';
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
	$config['charset'] = '';
	$config['collation'] = '';
	$config['prefix'] = '';
}

//Configurando diretórios Smarty
define("SMARTY_DIR", "smarty/");
define("SMARTY_TEMPLATE_DIR", "Views/templates");
define("SMARTY_TEMPLATE_C_DIR", "Views/templates_c");
define("SMARTY_CONFIGS", "Views/configs");
define("SMARTY_CACHE", "Views/cache");

//Setando diretórios para funcionamento do Smarty
require_once SMARTY_DIR . 'Smarty.class.php';
global $smarty;
$smarty = new Smarty();
$smarty->setTemplateDir(SMARTY_TEMPLATE_DIR);
$smarty->setCompileDir(SMARTY_TEMPLATE_C_DIR);
$smarty->setConfigDir(SMARTY_CONFIGS);
$smarty->setCacheDir(SMARTY_CACHE);
$smarty->assign('BASE', BASE);
