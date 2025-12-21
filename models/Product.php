<?php

require_once __DIR__ . '/../config/Database.php';

class Product {
    public static function getAll() {
        $pdo = Database::connect();
        return $pdo->query("SELECT * FROM products")
                   ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

