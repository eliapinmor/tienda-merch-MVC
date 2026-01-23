<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    public function showAllUsers() {
        // This method would typically retrieve all users from the database
        // and pass them to a view for rendering.
        $users = User::getAll(); // Assuming this method exists in User model
        require __DIR__ . '/../views/admin/users/index.php';
    }
}