<?php
    class Product extends Controlador {
        public function __construct() {
            $this->ProductModel = $this->modelo('ProductModel');
        }

        public function index() {
            $products = $this->ProductModel->getProducts();
            
            if($products):
                echo json_encode([
                    'status' => 'success',
                    'products' => $products
                ]);
            else:
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Products not found'
                ]);
            endif;
        }

        public function getOne($idProduct){
            $product = $this->ProductModel->getOne($idProduct);
            if($product):
                echo json_encode([
                    'status' => 'success',
                    'product' => $product
                ]);
            else:
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'Product not found'
                ]);
            endif;
        }

        public function create() {
            if($_SERVER['REQUEST_METHOD'] === 'POST'):
                $datos = [
                    'name' => $_POST['name'],
                    'value' => $_POST['value'],
                    'amount' => $_POST['amount'],
                ];

                if(!$this->ProductModel->create($datos)):
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'product created successfully',
                    ]);
                else:
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'error created product',
                    ]);
                endif;
            else:
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'error 500',
                ]);
            endif;
        }

        public function update($idProduct) {
            if($_SERVER['REQUEST_METHOD'] === 'POST'):
                $datos = [
                    'id' => $idProduct,
                    'name' => $_POST['name'],
                    'value' => $_POST['value'],
                    'amount' => $_POST['amount'],
                ];

                if(!$this->ProductModel->update($datos)):
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Product successfully updated'
                    ]);
                else:
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'error updated product',
                    ]);
                endif;
            else:
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'error in the server',
                ]);
            endif;
        }
        
        public function delete($idProduct) {
            if($_SERVER['REQUEST_METHOD'] === 'POST'):
                if(!$this->ProductModel->delete($idProduct)):
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Product successfully deleted'
                    ]);
                else:
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'error deleted product',
                    ]);
                endif;
            else:
                echo json_encode([
                    'status' => 'failed',
                    'message' => 'error in the server',
                ]);
            endif;
        }
    }
?>