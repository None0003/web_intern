<?php
class User {
    private $file;

    public function __construct() {
        $this->file = 'data/users.json';
    }

    public function getUser() {
        return json_decode(file_get_contents($this->file), true);
    }

    public function setUser($user) {
        file_put_contents($this->file, json_encode($user, JSON_PRETTY_PRINT));
    }

    public function register($username, $password) {
        $users = $this->getUser();
        foreach ($users as $user) {
            if ($user['username'] == $username) {
                return false;
            }
        }

        $user[] = [
            'username'=> $username,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ];

        $this->setUser($user);
    }

    public function login($username, $password) {
        $users = $this->getUser();
        foreach ($users as $user) {
            if ($user['username'] == $username && password_verify($password, $user['password']))  {
                return $user;
            }
        }
        return false;
    }
}