<?php

require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/ProductImage.php';
require_once __DIR__ . '/../models/Review.php';

class ProductController
{
    //tienda publica
    public function index()
    {
        $products = Product::getAllWithMainImage();
        require __DIR__ . '/../views/products/index.php';
    }

    public function show($id)
    {
        $product = Product::findById($id);
        if (!$product) {
            http_response_code(404);
            require_once __DIR__ . '/../views/errors/404.php';
            exit;
        }

        $relatedProducts = Product::getRelatedProducts($id, textForSearch: $product['description']);

        $relatedContext = implode(", ", array_column($relatedProducts, 'product_name'));

        $images = ProductImage::findByProduct($id);
        $reviews = Review::findByProduct($id);
        // require __DIR__ . '/../views/products/show.php';
        $this->render('products/show', [
            'product' => $product,
            'images' => $images,
            'reviews' => $reviews,
            'relatedProducts' => $relatedProducts,
            'relatedContext' => $relatedContext
        ]);
    }   

    protected function render(string $view, array $data = [])
    {
        extract($data);
        include __DIR__ . '/../views/' . $view . '.php';
    }

    //vista admin

    public function getAll()
    {
        $products = Product::getAll();

        $editProduct = null;
        $productsImages = [];

        if (isset($_GET['edit'])) {
            $editProduct = Product::findById($_GET['edit']);
            $productImages = ProductImage::findByProduct($_GET['edit']);
        }

        require __DIR__ . '/../views/admin/products.php';
    }

    public function saveProduct()
    {
        $isNew = false;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        if ($_POST['id']) {
            $productId = $_POST['id'];
            Product::update($_POST['id'], $name, $description, $price);
        } else {
            $productId = Product::create($name, $description, $price);
            if ($productId) {
                $isNew = true;
            }
        }
        if (!empty($_FILES['images']['name'][0])) {
            $this->uploadImages($productId, $_FILES['images']);
        }

        if ($isNew) {
            $mainImage = ProductImage::findMainImage($productId);
            if (empty($mainImage)) {
                $mainImage = 'images/home.avif';
            }
            $this->notificacionN8N($productId, $name, $price, $description, $mainImage);
        }
        header('Location: /admin/products');
    }

    public function deleteProduct()
    {
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
            if ($files['size'][$index] > 5_000_000)
                continue;

            $mime = mime_content_type($tmpName);
            if (!in_array($mime, ['image/jpeg', 'image/png', 'image/webp']))
                continue;

            $extension = pathinfo($files['name'][$index], PATHINFO_EXTENSION);
            $filename = uniqid('img_') . '.' . $extension;

            move_uploaded_file($tmpName, $basePath . $filename);
            $isMain = ($index === 0) ? 1 : 0;

            // Guardar en BD
            ProductImage::create(
                $productId,
                'uploads/products/' . $productId . '/' . $filename,
                $isMain
            );
        }
    }

    private function notificacionN8N($id, $name, $price, $description, $urlImg)
    {
        $url = 'http://mvc_n8n:5678/webhook-test/new-product';

        $data = [
            'event' => 'nuevo_merchandising',
            'producto' => $name,
            'descripcion' => $description,
            'precio' => $price,
            'url_imagen' => $urlImg,
            'url_producto' => 'http://localhost:8080/product/' . $id
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-Tienda-Token: secret123' // Seguridad para la RA5
        ]);

        // Ejecución asíncrona rápida (opcional para no ralentizar la web)
        curl_exec($ch);
        curl_close($ch);
    }

}

