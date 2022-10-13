<?php

    class MarcaModel{   
        private $db;

        public function __construct(){
            //Metodo constructor de la clase
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_ecommerceropa;charset=utf8','root','');
        }

        public function getAllMarca(){
            //Metodo encargado de traer todos los datos de la tabla marca
            $query = $this->db->prepare("SELECT * FROM marca");
            $query->execute();
            $marcas = $query->fetchAll(PDO::FETCH_OBJ);
            return $marcas;
        }

        public function deleteMarcaById($id){
            //Metodo encargado de borrar una marca
            $query = $this->db->prepare("DELETE FROM marca WHERE id_marca = ?");
            $query->execute([$id]);  
        }

        public function updateMarca($id,$nombre){
            //Metodo encargado de updatear una marca
            $query = $this->db->prepare("UPDATE marca SET nombre = ?WHERE id_marca= ?");
            $query->execute([$nombre,$id]);
        }

        public function addMarca($nombre){
            //Metodo encargado de añadir un producto
            $query = $this->db->prepare("INSERT INTO marca (nombre) VALUES (?)");
            $query->execute([$nombre]);
        }
    }

?>