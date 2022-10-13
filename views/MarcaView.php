<?php

    require_once "./libs/Smarty.class.php";

    class MarcaView {   
        private $smarty;
        
        public function __construct(){
            //Metodo constructor de la clase
            $this->smarty = new Smarty();
        }
        
        public function showMarca($marcas = null, $logged = false){
            //Metodo encargado de mostrar las marcas
            $this->smarty->assign('marcas', $marcas);
            $this->smarty->assign('logged', $logged);
            $this->smarty->display('./templates/marca.tpl');
        }

        public function showMarcaId($productos = null, $logged = false){
            //Metodo encargado de apartir de la marca mostrar sus productos
            $this->smarty->assign('productos', $productos);
            $this->smarty->assign('logged', $logged);
            $this->smarty->display('./templates/producto.tpl');
        }
    }

?>