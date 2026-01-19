<?php

class User
{
    public static function create($username, $email, $password, $role)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([$username, $email, $password, $role]);
    }
    public static function findByEmail($email)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
