<?php

require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/ProductImage.php';
require_once __DIR__ . '/../models/User.php';

class CartController
{
    public function index()
    {
        $cartItems = Cart::getCartItems($_SESSION['user_id']);
        require __DIR__ . '/../views/cart/index.php';
    }

    public function addProduct($product_id)
    {
        $cart = new Cart();
        $cart->user_id = $_SESSION['user_id'];
        $cart->product_id = $product_id;
        $cart->quantity = $_POST['quantity'];
        $cart->addToCart();
        header("Location: /cart");
    }

    private function deleteProduct()
    {
        // Implementar lógica para eliminar un producto del carrito
    }
}