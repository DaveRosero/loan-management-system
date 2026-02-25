<?php
require_once 'BaseController.php';

class RegisterController extends BaseController {
    protected Register $register;
    public function __construct(Register $register) {
        $this->register = $register;
    }

    public function handleRequest() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);

        switch ($_SERVER['REQUEST_METHOD']) {
        }
    }
}
?>