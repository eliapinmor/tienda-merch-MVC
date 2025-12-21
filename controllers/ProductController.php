<?php

require_once __DIR__ . '/../models/Product.php';

class ProductController {
    public function index() {
        $products = Product::getAll();
        require __DIR__ . '/../views/products/index.php';
    }

    public function show($id) {
        $product = Product::findById($id);
        require __DIR__ . '/../views/products/show.php';
    }
}

