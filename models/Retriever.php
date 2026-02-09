<?php
require_once __DIR__ . '/../config/Database.php';

class Retriever {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function search(string $query): array {
        // Buscamos en productos usando MATCH/AGAINST como pide el enunciado
        $stmt = $this->db->prepare(
            "SELECT id, product_name, description, price,
            MATCH(product_name, description) AGAINST(?) AS score
            FROM products
            WHERE MATCH(product_name, description) AGAINST(?)
            ORDER BY score DESC
            LIMIT 4"
        );
        $stmt->execute([$query, $query]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}