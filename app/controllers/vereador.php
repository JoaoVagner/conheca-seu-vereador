<?php

class vereador extends appController
{

    public function visualizar($params)
    {   
        $render = array('teste' => 'teste');
        $this->template('default.php', $this->view('vereador/index.php', $render));
    }

}

?>
