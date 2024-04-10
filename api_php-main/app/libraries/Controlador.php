<?php
	defined('BASEPATH') or exit('No se permite acceso directo');
	class Controlador {
		
		public function __construct() {

		}

		public function modelo($modelo) {
			require_once '../app/models/' . $modelo . '.php';
			return new $modelo();
		}

		public function vista($vista, $datos = []) {
			if(file_exists('../app/views/' . $vista . '.php')):
				require_once '../app/views/' . $vista . '.php';
			else:
				require_once '../app/views/Error/Error404.php';
			endif;
		}

		public function MostrarAlerta($vista, $selectkey, $selectvalue, $type, $message){
            $this->vista($vista, [$selectkey => $selectvalue , 'type' => $type , 'message' => $message]);
        }


	}
