<?php

/**
 *
 * @author João Vagner B. Medeiros
 * @package App Site
 */
//version app site Jonny Data 
define('APP_VERSION', '1.0-dev');


//access dispatch
include('dispatcher.php');

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


$urlAccess = isset($_GET) ? $_GET : null;
if ($urlAccess != null) {
    $explodeRouting = explode("/", $urlAccess['cod']);
    $access = array(
        'controller' => $explodeRouting[0],
        'action' => !isset($explodeRouting[1]) ? null : $explodeRouting[1],
        'params' => array()
    );
    
    if(isset($explodeRouting[2])) {
        unset($explodeRouting[0]);
        unset($explodeRouting[1]);
        
        $parameters = array();
        foreach($explodeRouting as $keyParam => $params) $parameters[] = $params;
        
        $access['params'] = $parameters;
    }
} else {
    $access = array(
        'controller' => 'home',
        'action' => 'index',
        'params' => array()
    );
}

    
    $initialize = new Dispatcher();
    $initialize->run($access['controller'], $access['action'], $access['params']);
?>