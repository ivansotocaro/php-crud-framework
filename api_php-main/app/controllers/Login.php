<?php defined('BASEPATH') or exit('No se permite acceso directo');

	class Login extends Controlador {
		
		public function __construct(){
			$this->LoginModel = $this->modelo("LoginModel");
		}

		public function index(){
			echo "API REST CON PHP - STORE ✌";
		}

		public function Auth(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST'): 
				$username = trim($_POST['username']);
				$password = trim($_POST['password']);
				$resulset = $this->LoginModel->Login($username);
				if ($resulset):
					if($resulset->password == $password):
						echo json_encode([
							'status' => 'success',
							'message' => 'Welcome ' . $resulset->name,
						]);
					else:
						echo json_encode([
							'status' => 'warning',
							'message' => 'password incorrect for the user', 
						]);
					endif;
				else:
					echo json_encode([
						'status' => 'warning',
						'message' => 'username or password incorrect',
					]);
				endif;	
			else:
				echo json_encode([
					'status' => 'error',
					'message' => 'error in the server 500',
				]);
			endif;					
		}
	}

	