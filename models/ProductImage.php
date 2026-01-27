<?php

require_once __DIR__ . '/../config/Database.php';

class ProductImage {
    public static function findByProduct($product_id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "SELECT * FROM product_images WHERE product_id = ?"
        );
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($productId, $path, $isMain = 0)
{
    $pdo = Database::connect();
    $stmt = $pdo->prepare(
        "INSERT INTO product_images (product_id, image_path, is_main) VALUES (?, ?, ?)"
    );
    return $stmt->execute([$productId, $path, $isMain]);
}

public static function findMainImage($productId)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            "SELECT * FROM product_images
             WHERE product_id = ? AND is_main = 1
             LIMIT 1"
        );
        $stmt->execute([$productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}