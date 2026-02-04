<?php

require_once __DIR__ . '/../models/Review.php';

class ReviewController
{

    public function create()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Si no hay usuario logueado, redirigir al login
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }

        // Instanciar y asignar propiedades siguiendo tu formato de Model
        $review = new Review();
        $review->user_id = $_SESSION['user_id'];
        $review->product_id = $_POST['product_id'];
        $review->rating = intval($_POST['rating']);
        $review->content = trim($_POST['content']);

        $review->create();

        // Volver a la página del producto
        header("Location: /product/" . $_POST['product_id']);
        exit;
    }

    //vista admin
    //getAll
public function getAll() {
        $reviews = Review::getAll();

        require __DIR__ . '/../views/admin/reviews.php';
    }

    public function deleteReview() {
        if (isset($_POST['id'])) {
            Review::delete($_POST['id']);
        }
        
        header('Location: /admin/reviews');
        exit;
    }
}
