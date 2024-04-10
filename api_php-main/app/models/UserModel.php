<?php
    class UserModel {
        private $db;

        function __construct(){
            $this->db = new Base;
        }

        public function getAllUsers(){
            $this->db->query("SELECT * FROM users");
            return $this->db->registros();
        }

        public function getOneUser($id){
            $this->db->query("SELECT * FROM users WHERE id = :id");
            $this->db->bind(':id', $id);
            return $this->db->registro();
        }

        public function createUser($datos){
            $this->db->query("INSERT INTO users (id, name, email, password, address, phone, date) VALUES (null,:name, :email, :password, :address, :phone, :date)");
            $this->db->bind(':name', $datos['name']);
            $this->db->bind(':email', $datos['email']);
            $this->db->bind(':password', $datos['password']);
            $this->db->bind(':address', $datos['address']);
            $this->db->bind(':phone', $datos['phone']);
            $this->db->bind(':date', $datos['date']);
            ($this->db->execute()) ? true : false ;
        }
    }
?>