<?php

class User {
    public $id;
    public $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public static function getAllUsers() {
        return [
            new User(1, "Luna"),
            new User(2, "Luna 2"),
        ];
    }
}