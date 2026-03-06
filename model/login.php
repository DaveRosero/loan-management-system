<?php
class Login {
    private PDO $conn;
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * from user WHERE user_email = :email AND user_password = :password LIMIT 1");
        $stmt->execute(["email" => $email, "password" => $password]);
        return $stmt->fetch();
    }
}
?>