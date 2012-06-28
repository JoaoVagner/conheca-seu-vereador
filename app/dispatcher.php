<?php

/**
 *
 * @author João Vagner B. Medeiros 
 * @package App Jonny Data
 * @subpackage Dispatcher controller router
 */
class Dispatcher
{
    
    /**
     * 
     */
    private function parserParams() {
        
    }
    
    
    /**
     *
     * @param string $controller
     * @param string $action
     * @param string $params
     * @return
     */
    function run($controller, $action = null, $params = null)
    {
        require_once('sys/appController.php');
        if (file_exists('controllers/' . $controller . ".php")) {
            require_once("controllers/" . $controller . ".php");
            $controller = new $controller();
            if (method_exists($controller, $action)) {
                if(!isset($params)) {
                    return $controller->$action();
                } else {
                    return $controller->$action($params);
                }
            } else {
                return $controller->index();
            }
        }
    }

}

?>
