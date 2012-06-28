<?php

class AppController
{

    public $paramUrl;
    protected $viewInternal;
    protected $paramsView;

    public function __construct()
    {
        
    }

    public function template($template)
    {
        require_once('views/template/' . $template);
    }

    public function view($view, $params = false)
    {   
        return $this->viewInternal = $this->get_include_contents('views/' . $view, $params);
        
    }

    private function get_include_contents($filename, $params = false)
    {
        if (is_file($filename)) {
            ob_start();
            
            if(isset($params)) {
                extract($params);
            }
            
            include $filename;
            
            return ob_get_clean();
        }
        return false;
    }

}

?>
