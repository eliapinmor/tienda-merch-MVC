<?php
require_once __DIR__ . '/../config/Database.php';

$pdo = Database::connect();

// 1. Obtenemos IDs reales para no romper la integridad referencial
$userIds = $pdo->query("SELECT id FROM users LIMIT 5")->fetchAll(PDO::FETCH_COLUMN);
$productIds = $pdo->query("SELECT id FROM products LIMIT 5")->fetchAll(PDO::FETCH_COLUMN);

if (empty($userIds) || empty($productIds)) {
    die("Error: Debes ejecutar primero los seeds de usuarios y productos.\n");
}

// 2. Definimos las reseñas siguiendo tu estructura de array
$reviews = [
    ['user_id' => $userIds[0], 'product_id' => $productIds[0], 'rating' => 5, 'content' => '¡Increíble! El sonido es puro y la edición limitada es preciosa.'],
    ['user_id' => $userIds[1], 'product_id' => $productIds[0], 'rating' => 4, 'content' => 'Muy buen disco, aunque el envío tardó un poco más de lo esperado.'],
    ['user_id' => $userIds[2], 'product_id' => $productIds[1], 'rating' => 5, 'content' => 'Una joya imprescindible para cualquier coleccionista de vinilos.'],
    ['user_id' => $userIds[3], 'product_id' => $productIds[1], 'rating' => 5, 'content' => 'Calidad de 10. Se nota que cuidan el embalaje para que no sufra daños.'],
    ['user_id' => $userIds[4], 'product_id' => $productIds[2], 'rating' => 3, 'content' => 'El producto es bueno, pero la descripción era un poco confusa.'],
    ['user_id' => $userIds[0], 'product_id' => $productIds[3], 'rating' => 5, 'content' => 'Sonido impecable, sin nada de ruido de fondo. Perfecto.'],
    ['user_id' => $userIds[1], 'product_id' => $productIds[4], 'rating' => 4, 'content' => 'Gran compra, el diseño de la portada es arte puro.'],
];

// 3. Preparamos e insertamos
$stmt = $pdo->prepare("INSERT INTO reviews (user_id, product_id, rating, content) VALUES (?, ?, ?, ?)");

foreach ($reviews as $review) {
    $stmt->execute([
        $review['user_id'], 
        $review['product_id'], 
        $review['rating'], 
        $review['content']
    ]);
}
