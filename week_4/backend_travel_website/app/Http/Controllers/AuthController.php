<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\AuthServiceInterface;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = $this->authService->login($validated['email'], $validated['password']);

        if ($result['status'] == 'success') {
            // Lưu thông tin người dùng vào session
            Session::put('user', $result['user']);
            return response()->json(['status' => 'success', 'user' => $result['user']]);
        } else {
            return response()->json($result, 401);
        }
    }

    public function logout(Request $request)
    {
        Session::forget('user');
        return response()->json(['status' => 'success', 'message' => 'Logged out successfully']);
    }

    public function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        $result = $this->authService->forgotPassword($validated['email']);
        return response()->json($result);
    }

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required',
            'password' => 'required|min:6'
        ]);

        $result = $this->authService->resetPassword($validated['token'], $validated['password']);
        return response()->json($result);
    }
}
