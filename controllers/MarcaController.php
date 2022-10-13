<?php

    require_once "./views/MarcaView.php";
    require_once "./models/MarcaModel.php";
    require_once "./helpers/UserHelper.php";
    require_once "./models/ProductoModel.php";

    class MarcaController{   
        private $marcaView;
        private $marcaModel;
        private $userHelper;

        public function __construct(){
            //Metodo constructor de la clase MarcaController
            $this->marcaView = new MarcaView();
            $this->marcaModel = new MarcaModel();
            $this->userHelper = new UserHelper();
        }

        public function showMarcas(){
            //Metodo encargado de traer toda la tabla de marcas y pasarselo a la view para que la imprima
            $logged = $this->userHelper->checkLoggedIn();
            $marcas = $this->marcaModel->getAllMarca();
            $this->marcaView->showMarca($marcas,$logged);
        }

        public function showMarcaId($id){
            //Metodo encargado de traer todos los productops de x marcas y pasarselo a la view para que la imprima
            $logged = $this->userHelper->checkLoggedIn();
            $productoModel = new ProductoModel();
            $productos = $productoModel->getProductoByIdMarca($id);
            $this->marcaView->showMarcaId($productos,$logged);
        }
        
        public function deleteMarca($id){
            //Metodo encargado de borrar la marca que recibe como parametro
            $this->marcaModel->deleteMarcaById($id);
            header("Location: " . BASE_URL . "marca");
        }

        public function modifyMarca($id){
            //Metodo de que modifica la tabla marca segun una id que recibe
            $logged = $this->userHelper->checkLoggedIn();
            if($logged){
                $nombre = $_POST['nombre'];
                $this->marcaModel->updateMarca($id,$nombre);
                header("Location: " . BASE_URL. "marca");
            }
        }

        public function addMarca(){
            //Metodo encargado de agregar una marca
            $logged = $this->userHelper->checkLoggedIn();
            if($logged){
                $nombre = $_POST['nombre'];
                $this->marcaModel->addMarca($nombre);
                header("Location: " . BASE_URL . "marca");
            }
        }
    }

?>