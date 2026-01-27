<?php

require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/ProductImage.php';

class ProductController {
    //tienda publica
    public function index() {
        $products = Product::getAll();
        require __DIR__ . '/../views/products/index.php';
    }

    public function show($id) {
        $product = Product::findById($id);
        $images = ProductImage::findByProduct($id);
        require __DIR__ . '/../views/products/show.php';
    }

    //vista admin

    public function getAll() {
        $products = Product::getAll();

        $editProduct = null;

        if (isset($_GET['edit'])) {
            $editProduct = Product::findById($_GET['edit']);
        }

        require __DIR__ . '/../views/admin/products.php';
    }

    public function saveProduct() {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        if ($_POST['id']) {
            $productId = $_POST[id];
            Product::update($_POST['id'], $name, $description, $price);
        } else {
            $productId = Product::create($name, $description, $price);
        }
            if (!empty($_FILES['images']['name'][0])) {
        $this->uploadImages($productId, $_FILES['images']);
    }
        header('Location: /admin/products');
    }

    public function deleteProduct() {
        Product::delete($_POST['id']);
        header('Location: /admin/products');
    }

    private function uploadImages($productId, $files)
{
    $basePath = __DIR__ . '/../public/uploads/products/' . $productId . '/';

    if (!is_dir($basePath)) {
        mkdir($basePath, 0777, true);
    }

    foreach ($files['tmp_name'] as $index => $tmpName) {
        if ($files['error'][$index] !== UPLOAD_ERR_OK) {
            continue;
        }

        // VALIDACIONES
        if ($files['size'][$index] > 2_000_000) continue; // 2MB máx

        $mime = mime_content_type($tmpName);
        if (!in_array($mime, ['image/jpeg', 'image/png', 'image/webp'])) continue;

        $extension = pathinfo($files['name'][$index], PATHINFO_EXTENSION);
        $filename = uniqid('img_') . '.' . $extension;

        move_uploaded_file($tmpName, $basePath . $filename);

        // Guardar en BD
        ProductImage::create(
            $productId,
            'uploads/products/' . $productId . '/' . $filename
        );
    }
}

}

