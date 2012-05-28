<?php

class AppController
{

    public $paramUrl;
    public $viewInternal;

    public function __construct()
    {
        
    }

    public function template($template)
    {
        require_once('views/template/' . $template);
    }

    public function view($view, $values = null)
    {
        $this->viewInternal = $this->get_include_contents('views/' . $view);
    }

    private function get_include_contents($filename)
    {
        if (is_file($filename)) {
            ob_start();
            include $filename;
            return ob_get_clean();
        }
        return false;
    }

}

?>
