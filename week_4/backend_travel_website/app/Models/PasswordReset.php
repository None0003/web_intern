<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    // Nếu bảng của bạn không tuân theo quy tắc đặt tên mặc định (plural form của tên model), bạn cần chỉ định tên bảng:
    protected $table = 'password_resets';

    // Chỉ định các thuộc tính có thể được gán hàng loạt (mass assignable)
    protected $fillable = [
        'email', 'token', 'created_at'
    ];

    // Nếu không sử dụng timestamps, cần tắt timestamps
    public $timestamps = false;
}
