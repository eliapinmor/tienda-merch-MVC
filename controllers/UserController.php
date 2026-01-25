<?php
require_once __DIR__ . '/../models/User.php';

class UserController
{
    public function getAll()
    {
        $users = User::getAll();


        $editUser = null;

        if (isset($_GET['edit'])) {
            $editUser = User::findById($_GET['edit']);
        }

        require __DIR__ . '/../views/admin/users.php';
    }

    public function saveUser()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);


        // si el usuario existe tiene un id por tanto lo actualizamos, ne cambio si estamos pasando un usario sin id se trata de uno inexistente y lo creamos
        if ($_POST['id']) {
            User::update($_POST['id'], $username, $email, $passwordHash, $role);
        } else {
            User::create($username, $email, $passwordHash, $role);
        }
        header('Location: /admin/users');
    }

    public function deleteUser()
    {
        User::delete($_POST['id']);
        header('Location: /admin/users');
    }
}