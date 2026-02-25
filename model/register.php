<?php
class Register {
    private PDO $conn;
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function register($email, $password, $role) {
        $user_count = $this->getUserCount();
        $role = $user_count === 0 ? "admin" : "user" ;
        $stmt = $this->conn->prepare("INSERT INTO user (user_email, user_password, user_role) VALUES (:email, :password, :role)");
        $stmt->execute([
            "email" => $email,
            "password" => $password,
            "role" => $role 
        ]);
    }

    public function getUserCount() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM user LIMIT 1");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getUser($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE user_id = :user_id LIMIT 1");
        $stmt->execute(["user_id" => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user !== false ? $user : null;
    }

    public function emailExists($email) {
        $stmt = $this->conn->prepare("SELECT 1 FROM user WHERE user_email = :email LIMIT 1");
        $stmt->execute(["email" => $email]);
        return $stmt->fetchColumn() !== false;
    }
}
?>