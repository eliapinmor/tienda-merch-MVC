<?php

require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/ProductImage.php';
require_once __DIR__ . '/../models/User.php';

class CartController
{
    public function index()
    {
        $userId = $_SESSION['user_id'] ?? null;
        if ($userId) {
            $cartItems = Cart::getByUser($userId);
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        require __DIR__ . '/../views/cart/index.php';
    }

    public function addProduct()
    {
        $user_id = $_SESSION['user_id'] ?? null;
        $product_id = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'];
        if ($user_id && $product_id) {
            $result = Cart::addToCart($user_id, $product_id, $quantity);
            if ($result) {
                $_SESSION['toast_message'] = "Producto añadido al carrito";
                $_SESSION['toast_type'] = "success";
            } else {
                $_SESSION['toast_message'] = "Error al añadir el producto al carrito";
                $_SESSION['toast_type'] = "error";
            }
        }

        header("Location: /product/{$product_id}");
        exit();
    }

    public function deleteProduct()
    {
        $user_id = $_SESSION['user_id'] ?? null;
        $product_id = $_POST['product_id'] ?? null;
        if ($user_id && $product_id) {
            Cart::removeFromCart($user_id, $product_id);
                $_SESSION['toast_message'] = "Producto eliminado del carrito";
                $_SESSION['toast_type'] = "success";
 
        }
        header("Location: /cart");
        exit();
    }
}