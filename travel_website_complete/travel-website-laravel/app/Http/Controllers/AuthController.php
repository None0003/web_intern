<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
            ]);

            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status_code' => 401,
                    'message' => 'Wrong email or password'
                ]);
            }

            $request->session()->regenerate();

            return response()->json([
                'status_code' => 200,
                'message' => 'Login successful'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Wrong email or password'
            ]);
        }
    }

    // Cannot send mail yet
    public function forgotPassword(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);

            $token = Str::random(60);

            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->email],
                ['token' => $token, 'created_at' => now()]
            );

            $resetUrl = url("/reset-password?token={$token}");

            Mail::to($request->email)->send(new ResetPasswordMail($resetUrl));

            return response()->json([
                'status_code' => 200,
                'message' => 'Reset link sent to your email address.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'password' => 'required|string|min:8|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
        ]);

        try {
            $record = DB::table('password_reset_tokens')
                        ->where('token', $request->token)
                        ->first();

            if (!$record) {
                return response()->json([
                    'status_code' => 400,
                    'message' => 'Invalid token'
                ], 400);
            }

            $email = $record->email;

            DB::table('users')
                ->where('email', $email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_reset_tokens')
                ->where('token', $request->token)
                ->delete();

            return response()->json([
                'status_code' => 200,
                'message' => 'Password has been reset successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json([
                'status_code' => 200,
                'message' => 'Logout successful'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => 'An error occurred during logout: ' . $e->getMessage()
            ]);
        }
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
