<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function findByEmail($email);
    public function findById($id);
    public function save($user);
}
