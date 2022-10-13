<?php

require_once "./libs/Smarty.class.php";

class UserView{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showHome(){
        $this->smarty->display('./templates/home.tpl');
    }

    function showFormLogin($error = null,$logged = false) {
        $this->smarty->assign('error', $error);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('./templates/formLogin.tpl');
    }

}

?>