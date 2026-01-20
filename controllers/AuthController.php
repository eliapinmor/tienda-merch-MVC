<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    // REGISTER
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $pass = $_POST['password'];
            if (!isset($_POST['role'])) {
                $role = 'customer';
            } else {
                $role = $_POST['role'];
            }
            if ($username === '' || $email === '' || $pass === '') {
                $error = "Todos los campos son obligatorios";
                require __DIR__ . '/../views/auth/register.php';
                return;
            }

            $passwordHash = password_hash($pass, PASSWORD_BCRYPT);

            User::create($username, $email, $passwordHash, $role);

            header('Location: /login');
            exit;
        }

        require __DIR__ . '/../views/auth/register.php';
    }

    // LOGIN
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email']);
            $pass = $_POST['password'];

            $user = User::findByEmail($email);

            if (!$user || !password_verify($pass, $user['password_hash'])) {
                $error = "Email o contraseña incorrectos";
                require __DIR__ . '/../views/auth/login.php';
                return;
            }

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_username'] = $user['username'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            

            header('Location: /');
            exit;
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    // LOGOUT
    public function logout()
    {
        session_start();
        session_destroy();

        header('Location: /');
        exit;
    }
}
