<?php
    require_once "./controllers/UserController.php";
    require_once "./controllers/MarcaController.php";
    require_once "./controllers/ProductoController.php";
    require_once "./helpers/UserHelper.php";

    //Definicion de la constante que tiene la URL BASE
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // lee la acción
    if (!empty($_GET['action']))
        $action = $_GET['action'];
    else
        $action = 'home'; // acción por defecto si no envían

    // parsea la accion    
    $params = explode('/', $action);

    // determina que camino seguir según la acción
    switch ($params[0]) {
        case 'home': //Muestra el home de la pagina
            $userController = new UserController();
            $userController->showHome();
            break;
        case 'login': //Muestra el login de la pagina
            $userController = new UserController();
            $userController->showFormLogin();
            break;
        case 'validate': //Valida los datos ingresados del form login
            $userController = new UserController();
            $userController->validateUser();
            break;
        case 'logout': //Muestra y deslogue al usuario
            $userController = new UserController();
            $userController->logout();
            break;
        case 'producto': //Muestra los productos y sus diferentes acciones
            if(isset($params[2]) and ('borrar' == $params[2])){ //Borra
                if(isset($params[1])){
                    $id = $params[1];
                    $productoController = new ProductoController();
                    $productoController->deleteProducto($id);
                }
            }
            elseif(isset($params[2]) and ('editar' == $params[2])){ //Edita
                if(isset($params[1])){
                    $id = $params[1];
                    $productoController = new ProductoController();
                    $productoController->modifyProducto($id);
                }
            }
            elseif(isset($params[1]) and ('agregar' == $params[1])){ //Agrega
                $productoController = new ProductoController();
                $productoController->addProducto();
            }
            elseif(isset($params[1])){ //Muestra producto a partir de una id
                $id = $params[1];
                $productoController = new ProductoController();
                $productoController->showProducto($id);
            }
            else{ //Muestra todos los productos
                $productoController = new ProductoController();
                $productoController->showProductos();
            }
            break;
        case 'marca': //Muestras todas las marcas
            if(isset($params[2]) and ('borrar' == $params[2])){ //Borrar
                if(isset($params[1])){
                    $id = $params[1];
                    $marcaController = new MarcaController();
                    $marcaController->deleteMarca($id);
                }
            }
            elseif(isset($params[2]) and ('editar' == $params[2])){ //Editar
                if(isset($params[1])){
                    $id = $params[1];
                    $marcaController = new MarcaController();
                    $marcaController->modifyMarca($id);
                }
            }
            elseif(isset($params[1]) and ('agregar' == $params[1])){ //Agregar
                $marcaController = new MarcaController();
                $marcaController->addMarca();
            }
            elseif(isset($params[1])){ //Muestra los productos de x marca
                $id = $params[1];
                $marcaController = new MarcaController();
                $marcaController->showMarcaId($id);
            }
            else{ //Muestra las marcas
                $marcaController = new MarcaController();
                $marcaController->showMarcas();
            }
            break;
        default:  //Caso default de la pagina
            echo('404 Page not found'); 
            break;
    }

?>