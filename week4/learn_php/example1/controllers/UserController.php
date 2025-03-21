<?php
require_once "models/User.php";

class UserController {
    public function index() {
        $users = User::getAllUsers();

        require_once "views/user_list.php";
    }
}