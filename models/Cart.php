<?php
require_once __DIR__ . '/../config/Database.php';

class Cart
{
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;

    public function addToCart()
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("
            INSERT INTO cart (user_id, product_id, quantity)
            VALUES (:user_id, :product_id, :quantity)
            ON DUPLICATE KEY UPDATE quantity = quantity + :quantity
        ");
        $stmt->execute([
            ':user_id' => $this->user_id,
            ':product_id' => $this->product_id,
            ':quantity' => $this->quantity
        ]);
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


    public static function removeFromCart($user_id, $product_id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->execute([
            ':user_id' => $user_id,
            ':product_id' => $product_id
        ]);
    }

    // public static function clearCart($user_id)
    // {
    //     $pdo = Database::connect();
    //     $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id");
    //     $stmt->execute([':user_id' => $user_id]);
    // }
}