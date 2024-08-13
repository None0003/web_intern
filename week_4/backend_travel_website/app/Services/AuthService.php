<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService implements AuthServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($email, $password)
    {
        $user = $this->userRepository->findByEmail($email);

        if ($user && Hash::check($password, $user->password)) {
            return ['status' => 'success', 'user' => $user];
        }

        return ['status' => 'error', 'message' => 'Invalid credentials'];
    }

    public function logout($userId)
    {
        // Logout logic handled in the controller using Auth facade
        return ['status' => 'success', 'message' => 'Logged out successfully'];
    }

    public function forgotPassword($email)
    {
        $user = $this->userRepository->findByEmail($email);

        if ($user) {
            $token = Str::random(60); // Sử dụng Str::random để tạo token
            // Thực hiện lưu token vào bảng password_resets (omitted)
            return ['status' => 'success', 'message' => 'Password reset link sent'];
        }

        return ['status' => 'error', 'message' => 'Email not found'];
    }

    public function resetPassword($token, $password)
    {
        // Logic xử lý reset password (omitted)
        return ['status' => 'success', 'message' => 'Password has been reset'];
    }
}
