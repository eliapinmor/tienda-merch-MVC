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


        // si el usuario existe tiene un id por tanto lo actualizamos, ne cambio si estamos pasando un usario sin id se trata de uno inexistente y lo creamos
        if ($_POST['id']) {
            if (!empty($_POST['password'])) {
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);

                User::update($_POST['id'], $username, $email, $passwordHash, $role);
            } else {
                User::updateWithoutPassword($_POST['id'], $username, $email, $role);
            }
        } else {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

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