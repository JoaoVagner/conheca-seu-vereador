<?php

/**
 *
 * @author João Vagner B. Medeiros
 * @package App Site
 */
//version app site Jonny Data 
define('APP_VERSION', '1.0-dev');

//enviroment send for method get?
if (isset($_GET['ENVIRONMENT'])) {
    define('ENVIRONMENT', $_GET['ENVIRONMENT']);
} else { //enviroment default debug development
    define('ENVIRONMENT', 'development');
}

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            ini_set("display_errors", 1);
            break;
        case 'testing':
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('Coloque um ambiente válido para continuar.');
    }
}


$explodeRouting = explode("/", $_GET['cod']);
$controller = $explodeRouting[0];

$action = !isset($explodeRouting[1]) ? null : $explodeRouting[1]; 

include('dispatcher.php');
$initialize = new Dispatcher();
$initialize->run($controller, $action);
?>