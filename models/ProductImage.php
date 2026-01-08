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
}