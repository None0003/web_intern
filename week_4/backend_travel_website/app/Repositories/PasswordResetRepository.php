<?php

namespace App\Repositories;

use App\Models\PasswordReset;

class PasswordResetRepository implements PasswordResetRepositoryInterface
{
    public function findByToken($token)
    {
        return PasswordReset::where('token', $token)->first();
    }

    public function create($data)
    {
        return PasswordReset::create($data);
    }

    public function delete($token)
    {
        PasswordReset::where('token', $token)->delete();
    }
}
