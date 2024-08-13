<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function save($user)
    {
        $user->save();
    }
}
