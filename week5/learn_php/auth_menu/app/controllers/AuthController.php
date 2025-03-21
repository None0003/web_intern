<?php
require_once "app/models/User.php";

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirm_password"];

            if ($confirmpassword != $password) {
                $_SESSION["error"] = "Incorrect!";
                header("Location: /register");
                exit;
            }

            if ($this->userModel->register($username, $password,)) {
                $_SESSION["success"] = "Created success!";
                header("Location /login");
            } else {
                $_SESSION["error"] = "Create failed!";
                header("Location: /register");
            }
        }
    }

    public function login() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION["user"] = $user;
                header("Location: /dashboard");
            } else {
                $_SESSION["error"] = "Login fail!";
                header("Location: /login");
            }
        }       
    }

    public function logout() {
        session_destroy();
        header("Location: /login");
    }
}