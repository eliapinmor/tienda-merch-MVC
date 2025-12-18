<?php
$stmt = $this->db->prepare(
"INSERT INTO products (title, content, user_id) VALUES (?, ?, ?)"
);
$stmt->execute([$title, $content, $userId]);
