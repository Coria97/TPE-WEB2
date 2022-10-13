<?php

    class UserModel {
        private $db;

        public function __construct(){   
            //Metodo constructor de la clase
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_ecommerceropa;charset=utf8','root','');
        }
        
        public function getUserByEmail($email){
            //Metodo encargado de recuperar un usuario a partir del email
            $query = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
            $query->execute([$email]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
    }

?>