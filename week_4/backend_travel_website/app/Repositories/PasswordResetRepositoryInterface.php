<?php

namespace App\Repositories;

interface PasswordResetRepositoryInterface
{
    public function findByToken($token);
    public function create($data);
    public function delete($token);
}
