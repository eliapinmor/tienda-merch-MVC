<?php

require_once __DIR__ . '/../config/Database.php';

class Product {
    public static function getAll() {
        $pdo = Database::connect();
        return $pdo->query("SELECT * FROM products")
                   ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllWithMainImage() {
        $pdo = Database::connect();

        $sql = "SELECT p.*, pi.image_path
            FROM products p
            LEFT JOIN product_images pi
            ON p.id = pi.product_id AND pi.is_main = 1";

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function findById($id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($name, $description, $price) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "INSERT INTO products (product_name, description, price) VALUES (?, ?, ?)"
        );
        $stmt->execute([$name, $description, $price]);
        return $pdo->lastInsertId();
    }

    public static function update($id, $name, $description, $price) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "UPDATE products SET product_name = ?, description = ?, price = ? WHERE id = ?"
        );
        return $stmt->execute([$name, $description, $price, $id]);
    }

    public static function delete($id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }



    


}

