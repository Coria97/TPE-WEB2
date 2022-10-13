<?php

    require_once "./libs/Smarty.class.php";

    class ProductoView {   
        private $smarty;
        
        public function __construct(){
            //Metodo constructor de la clase
            $this->smarty = new Smarty();
        }
        
        public function showProductos($productos = null, $logged = false){
            //Metodo encargado de mostrar los productos
            $this->smarty->assign('productos', $productos);
            $this->smarty->assign('logged', $logged);
            $this->smarty->display('./templates/producto.tpl');
        }

        public function showProducto($producto = null, $logged = false){
            //Metodo encargado de mostrar un producto
            $this->smarty->assign('producto', $producto);
            $this->smarty->assign('logged', $logged);
            $this->smarty->display('./templates/producto_id.tpl');
        }
    }

?>