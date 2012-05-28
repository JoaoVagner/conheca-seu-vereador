<?php

class vereador extends appController
{
    public function visualizar() {
        
        
        $this->template('default.php');
        $this->view('vereador/index.php');
        //echo "oi";
    }
}

?>
