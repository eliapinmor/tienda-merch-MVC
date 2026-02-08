<?php
require_once __DIR__ . '/../config/Database.php';

class Cart
{
    public static function addToCart($user_id, $product_id, $quantity)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)");
        return $stmt->execute([$user_id, $product_id, $quantity]);

    }

    public static function getCartItems($user_id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("
            SELECT c.*, p.product_name, p.price 
            FROM cart c
            JOIN products p ON p.id = c.product_id
            WHERE c.user_id = :user_id
        ");
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByUser($userId) {
    $pdo = Database::connect();
    // Usamos SUM(c.quantity) y GROUP BY p.id para colapsar los duplicados
    $sql = "SELECT 
                p.id, 
                p.product_name, 
                p.price, 
                SUM(c.quantity) AS quantity, 
                ANY_VALUE(pi.image_path) AS image_path
            FROM cart c
            JOIN products p ON c.product_id = p.id
            LEFT JOIN product_images pi ON p.id = pi.product_id AND pi.is_main = 1
            WHERE c.user_id = ?
            GROUP BY p.id"; // Agrupamos por producto
            
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public static function removeFromCart($user_id, $product_id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->execute([
            ':user_id' => $user_id,
            ':product_id' => $product_id
        ]);
    }

}