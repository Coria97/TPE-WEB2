<?php

    class UserHelper{

        /**
         * Verifica que el user este logueado y si no lo está
         * lo redirige al login.
         */
        public function __construct(){
            //Metodo constructor de la clase
            if(session_status() != PHP_SESSION_ACTIVE)
                session_start();
        }

        public function checkLoggedIn() {
            //Metodo que se encarga de verificar si el usuario esta logueado
            if (!isset($_SESSION['IS_LOGGED'])) 
                return false;
            else
                return true;
        } 
    }
?>
