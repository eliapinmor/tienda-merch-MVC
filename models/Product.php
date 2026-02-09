<?php

require_once __DIR__ . '/../config/Database.php';

class Product
{
    // public static function getAll() {
    //     $pdo = Database::connect();
    //     return $pdo->query("SELECT * FROM products")
    //                ->fetchAll(PDO::FETCH_ASSOC);
    // }

    public static function getAllWithMainImage()
    {
        $pdo = Database::connect();

        $sql = "SELECT p.*, pi.image_path
             FROM products p
             LEFT JOIN product_images pi
             ON p.id = pi.product_id AND pi.is_main = 1";

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = "
        SELECT 
            p.*,
            MIN(pi.image_path) AS image_path
        FROM products p
        LEFT JOIN product_images pi ON pi.product_id = p.id
        GROUP BY p.id
    ";

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function findById($id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product ?: null;
    }

    public static function create($name, $description, $price)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "INSERT INTO products (product_name, description, price) VALUES (?, ?, ?)"
        );
        $stmt->execute([$name, $description, $price]);
        return $pdo->lastInsertId();
    }

    public static function update($id, $name, $description, $price)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "UPDATE products SET product_name = ?, description = ?, price = ? WHERE id = ?"
        );
        return $stmt->execute([$name, $description, $price, $id]);
    }

    public static function delete($id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getRelatedProducts($id, $textForSearch)
    {
        $db = Database::connect();

        // Usamos una subconsulta para obtener la primera imagen de cada producto relacionado
        $sql = "SELECT p.*, 
            (SELECT pi.image_path FROM product_images pi WHERE pi.product_id = p.id LIMIT 1) AS image_path
            FROM products p
            WHERE MATCH(p.product_name, p.description) AGAINST(?) 
            AND p.id != ?
            ORDER BY MATCH(p.product_name, p.description) AGAINST(?) DESC 
            LIMIT 4";

        $stmt = $db->prepare($sql);
        // Pasamos: 1. Texto para buscar, 2. ID para excluir, 3. Texto para ordenar por relevancia
        $stmt->execute([$textForSearch, $id, $textForSearch]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}

