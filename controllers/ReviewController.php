<?php
require_once __DIR__ . '/../config/Database.php';

class ReviewsController {

    public function store() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
        $pdo = Database::connect();
        $review = new Review($pdo);
        $review->user_id = $_SESSION['user_id'];
        $review->product_id = $_POST['product_id'];
        $review->rating = $_POST['rating'];
        $review->content = $_POST['content'];

        $review->create();

        header("Location: /product/show?id=" . $_POST['product_id']);
    }
}
