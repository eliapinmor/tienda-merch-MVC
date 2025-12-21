<?php

class User {
    public static function create($email, $password) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "INSERT INTO users (email, password) VALUES (?, ?)"
        );
        return $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT)]);
    }
}
