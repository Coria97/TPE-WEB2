<?php

    require_once "./models/UserModel.php";
    require_once "./views/UserView.php";
    require_once "./helpers/UserHelper.php";

    class UserController{
        private $userView;
        private $userModel;
        private $userHelper;

        public function __construct(){
            //Metodo constructor de la clase UserController
            $this->userModel = new UserModel();
            $this->userView = new UserView();
            $this->userHelper = new UserHelper();
        }

        public function showHome(){
            //Se encarga de mostrar la pagina principal
            $this->userView->showHome();
        }

        public function showFormLogin(){
            //Metodo encargado de mostrar el formulario 
            $logged = $this->userHelper->checkLoggedIn();
            $this->userView->showFormLogin("",$logged);
        }

        public function validateUser(){
            //Metodo encargado de verificar que los datos ingresados sean de un admin
            $logged = $this->userHelper->checkLoggedIn();
            if(!$logged) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = $this->userModel->getUserByEmail($email);
                if(!empty($user) && password_verify($password,$user->password)){
                    session_start();
                    $_SESSION['USER_ID'] = $user->id_user;
                    $_SESSION['USER_EMAIL'] = $user->email;
                    $_SESSION['IS_LOGGED'] = true;
                    header("Location: " . BASE_URL);
                }
                else
                    $this->userView->showFormLogin("El usuario o la contraseña no existe.",$logged);
            }

        }

        public function logout(){
            //Metodo encargado de desloguear al admin
            session_start();
            session_destroy();
            header("Location: " . BASE_URL . "login");
        }
    }

?>