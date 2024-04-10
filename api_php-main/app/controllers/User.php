<?php
    defined('BASEPATH') or exit('No se permite acceso directo');

    class User extends Controlador {
        public function __construct() {
            $this->UserModel = $this->modelo('UserModel');
        }

        public function index() {
            $users = $this->UserModel->getAllUsers();
            if ($users):
                echo json_encode([
                    'status' => 'success',
                    'users' => $users
                ]);
            else:
                echo json_encode([
                    'status' => 'success',
                    'message' => 'No users found'
                ]);
            endif;
        }

        public function getOne() {
            $userID = $_GET['userID'];
            $user = $this->UserModel->getOneUser($userID);
            if ($user):
                echo json_encode([
                    'status' => 'success',
                    'users' => $user
                ]);
            else:
                echo json_encode([
                    'status' => 'success',
                    'message' => 'No users found'
                ]);
            endif;
        }

        public function create(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'):
                $datos = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'address' => trim($_POST['address']),
                    'phone' => trim($_POST['phone']),
                    'date' => trim($_POST['date'])
                ];

                if(!$this->UserModel->createUser($datos)):
                    echo json_encode([
                        'status' =>'success',
                        'message' => 'Successfully created'
                    ]);
                else:
                    echo json_encode([
                        'status' =>'failed',
                        'message' => 'Something went wrong'
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

?>