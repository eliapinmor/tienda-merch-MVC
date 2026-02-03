<?php

require_once __DIR__ . '/../config/Database.php';
class Review {
    public $id;
    public $user_id;
    public $product_id;
    public $rating;
    public $content;
    public $created_at;

    // private $db;

    // public function __construct($db) {
    //     $this->db = $db;
    // }

    public function create() {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("
            INSERT INTO reviews (user_id, product_id, rating, content)
            VALUES (:user_id, :product_id, :rating, :content)
        ");
        $stmt->execute([
            ':user_id' => $this->user_id,
            ':product_id' => $this->product_id,
            ':rating' => $this->rating,
            ':content' => $this->content
        ]);
        return $pdo->lastInsertId();
    }

    public static function findByProduct($product_id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("
            SELECT c.*, u.username 
            FROM reviews c
            JOIN users u ON u.id = c.user_id
            WHERE c.product_id = :product_id
            ORDER BY created_at DESC
        ");
        $stmt->execute([':product_id' => $product_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
