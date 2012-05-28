<?php

/**
 *
 * @author João Vagner B. Medeiros 
 * @package App Jonny Data
 * @subpackage Dispatcher controller router
 */
class Dispatcher
{

    function run($controller, $action = null)
    {
        require_once('sys/appController.php');
        if (file_exists('controllers/'.$controller . ".php")) {
            require_once("controllers/" . $controller . ".php");
            $controller = new $controller();
            if (method_exists($controller, $action)) {
                return $controller->$action();
            } else {
                return $controller->index();
            }
        }
    }

}

?>
