<?php
require_once __DIR__ . '/../Models/Producto.php';

class ProductoController {
    public function create()
    {
    return $this->render('products/create.php');
}
}
