<?php
require_once __DIR__ . '/../config/Database.php';

$users = [
    ['username' => 'admin', 'email' => 'admin@urbanmerch.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'admin'],
    ['username' => 'juanperez', 'email' => 'juan@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'maria', 'email' => 'maria@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'carlos', 'email' => 'carlos@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'ana', 'email' => 'ana@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'luis', 'email' => 'luis@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'sophia', 'email' => 'sophia@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'david', 'email' => 'david@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'isabella', 'email' => 'isabella@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'jose', 'email' => 'jose@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'laura', 'email' => 'laura@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer'],
    ['username' => 'miguel', 'email' => 'miguel@gmail.com', 'password_hash' => '$2y$10$TvOGt/MzbtjddzUjw5g/.OsR0kQlc7ACiZw8TRHP6xOdCmILufcl2', 'role' => 'customer']
];

$pdo = Database::connect();
$stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, ?)");

foreach ($users as $user) {
    $stmt->execute([$user['username'], $user['email'], $user['password_hash'], $user['role']]);
}