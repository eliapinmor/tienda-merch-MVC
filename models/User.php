<?php

class User
{
    public static function getAll()
    {
        $pdo = Database::connect();
        return $pdo->query("SELECT * FROM users")
                   ->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create($username, $email, $password, $role)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([$username, $email, $password, $role]);
    }
    public static function update($id, $username, $email, $password, $role)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "UPDATE users SET username = ?, email = ?, password_hash = ?, role = ? WHERE id = ?"
        );
        return $stmt->execute([$username, $email, $password, $role, $id]);
    }
    public static function updateWithoutPassword($id, $username, $email, $role)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?"
        );
        return $stmt->execute([$username, $email, $role, $id]);
    }

    public static function delete($id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public static function findByEmail($email)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function findById($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
