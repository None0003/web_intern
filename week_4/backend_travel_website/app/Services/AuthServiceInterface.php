<?php

namespace App\Services;

interface AuthServiceInterface
{
    public function login($email, $password);
    public function logout($userId);
    public function forgotPassword($email);
    public function resetPassword($token, $password);
}
