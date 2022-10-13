<?php

    require_once "./views/ProductoView.php";
    require_once "./models/ProductoModel.php";
    require_once "./helpers/UserHelper.php";

    class ProductoController{   
        private $productoView;
        private $productoModel;
        private $userHelper;

        public function __construct(){
            //Metodo constructor de la clase ProductoController
            $this->productoView = new ProductoView();
            $this->productoModel = new ProductoModel();
            $this->userHelper = new UserHelper();
        }

        public function deleteProducto($id){
            //Metodo encargado de eliminar el producto que recibe por parametro
            $this->productoModel->deleteProductoById($id);
            header("Location: " . BASE_URL . "producto");
        }

        public function showProductos(){
            //Metodo encargado de traer y enviarle a la vista los productos para que los muestre
            $logged = $this->userHelper->checkLoggedIn();
            $productos = $this->productoModel->getAllProductos();
            $this->productoView->showProductos($productos,$logged);
        }

        public function addProducto(){
            //Metodo encargado de añadir un producto a la tabla
            $logged = $this->userHelper->checkLoggedIn();
            if($logged){
                $nombre = $_POST['nombre'];
                $tipo = $_POST['tipo'];
                $precio = $_POST['precio'];
                $foto = $_POST['foto'];
                $nombre_marca = $_POST['nombre_marca'];
                $this->productoModel->addProducto($nombre,$tipo,$precio,$foto,$nombre_marca);
                header("Location: " . BASE_URL. "producto");
            }
        }

        public function showProducto($id){
            //Metodo encargado de recuperar y mostrar x producto
            $logged = $this->userHelper->checkLoggedIn();
            $producto = $this->productoModel->getProductoById($id);
            $this->productoView->showProducto($producto,$logged);
        }

        public function modifyProducto($id){
            //Metodo encargado de modificar x producto
            $logged = $this->userHelper->checkLoggedIn();
            if($logged){
                $nombre = $_POST['nombre'];
                $tipo = $_POST['tipo'];
                $precio = $_POST['precio'];
                $foto = $_POST['foto'];
                $this->productoModel->updateProducto($nombre,$tipo,$precio,$foto,$id);
                header("Location: " . BASE_URL. "producto/" . $id );
            }
        }
        
    }

?>