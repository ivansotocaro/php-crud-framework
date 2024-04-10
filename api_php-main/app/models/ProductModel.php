<?php 
    class ProductModel {
        private $db;

        public function __construct() {
            $this->db = new Base;
        }
        
        public function getProducts(){
            $this->db->query("SELECT * FROM products");
            return $this->db->registros();
        }

        public function getOne($id) {
            $this->db->query("SELECT * FROM products WHERE id = :id");
            $this->db->bind(':id', $id);
            return $this->db->registro();
        }

        public function create($datos){
            $this->db->query('INSERT INTO products (id,name, value, amount) VALUES (null,:name, :value, :amount)');
            $this->db->bind(':name', $datos['name']);
            $this->db->bind(':value', $datos['value']);
            $this->db->bind(':amount', $datos['amount']);
            ($this->db->execute()) ? true : false;
        }

        public function update($datos){
            $this->db->query("UPDATE products SET name = :name, value = :value, amount = :amount WHERE id = :id");
            $this->db->bind(':id', $datos['id']);
            $this->db->bind(':name', $datos['name']);
            $this->db->bind(':value', $datos['value']);
            $this->db->bind(':amount', $datos['amount']);
            ($this->db->execute()) ? true : false;
        }

        public function delete($idProduct){
            $this->db->query("DELETE FROM products WHERE idProduct = :idProduct");
            $this->db->bind(':idProduct', $idProduct);
            ($this->db->execute()) ? true : false;
        }

    }
?>