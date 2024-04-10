<?php
    class Home extends Controlador{
        public function Index(){
            $datos = [
                'name' => 'Home',
            ];
            echo $datos['name'];
        }   
    }

?>