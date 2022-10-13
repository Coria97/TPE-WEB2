<?php

    class ProductoModel{   
        private $db;

        public function __construct(){
            //Metodo constructor
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_ecommerceropa;charset=utf8','root','');
        }

        public function getAllProductos(){
            //Metodo encargado de traer todos los productos y el nombre de la marca del producto
            $query = $this->db->prepare("SELECT p.id_producto,p.nombre,p.tipo,p.precio,p.foto,m.nombre `nombre_marca` FROM producto p INNER JOIN marca m ON p.fk_id_marca=m.id_marca");
            $query->execute();
            $productos = $query->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        }

        public function getProductoByIdMarca($id){
            //Metodo encargado de traer un producto a partir de una marca
            $query = $this->db->prepare("SELECT p.id_producto,p.nombre,p.tipo,p.precio,p.foto,m.nombre `nombre_marca` FROM producto p, marca m WHERE p.fk_id_marca = ? AND m.id_marca = ?");
            $query->execute([$id,$id]);
            $productos = $query->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        }

        public function deleteProductoById($id){
            //Metodo encargado de borrar el producto a partir de la id
            $query = $this->db->prepare("DELETE FROM producto WHERE id_producto = ?");
            $query->execute([$id]);    
        }

        public function addProducto($nombre,$tipo,$precio,$foto,$nombre_marca){
            //Metodo encargado de añadir un producto
            $query_marca = $this->db->prepare("SELECT * FROM marca WHERE nombre = ?");
            $query_marca->execute([$nombre_marca]);
            $marca = $query_marca->fetch(PDO::FETCH_OBJ);
            if(!empty($marca)){
                $query_producto = $this->db->prepare("INSERT INTO producto (nombre, tipo, precio, foto, fk_id_marca) VALUES (?,?,?,?,?)");
                $query_producto->execute([$nombre,$tipo,$precio,$foto,$marca->id_marca]);
            }
        }

        public function getProductoById($id){
            //Metodo encargado de recuperrar el producto a partir de una id
            $query_producto = $this->db->prepare("SELECT * FROM producto WHERE id_producto = ?");
            $query_producto->execute([$id]);
            $producto = $query_producto->fetch(PDO::FETCH_OBJ);
            $query = $this->db->prepare("SELECT p.id_producto,p.nombre,p.tipo,p.precio,p.foto,m.nombre `nombre_marca` FROM producto p, marca m WHERE p.fk_id_marca = ? AND m.id_marca = ?");
            $query->execute([$producto->fk_id_marca,$producto->fk_id_marca]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function updateProducto($nombre,$tipo,$precio,$foto,$id){
            //Metodo encargado de modificar un producto
            $query = $this->db->prepare("UPDATE producto SET nombre = ? ,tipo = ? ,precio = ?, foto = ? WHERE id_producto= ?");
            $query->execute([$nombre,$tipo,$precio,$foto,$id]);
        }
    }
?>