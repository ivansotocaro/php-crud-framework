<?php
    class LoginModel {
      
        private $db;

        function __construct(){ 
          $this->db = new Base;
        }

        public function Login($username = ''){
          $this->db->query("SELECT id, name, email, password FROM users WHERE email = :username");
          $this->db->bind(':username', $username);
          return $this->db->registro();
        }
    }

    