<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'nhan_vien';
    protected $fillable = ['ho_ten', 'ngay_sinh', 'gioi_tinh', 'so_dien_thoai', 'email', 'dia_chi', 'avatar'];
    public $timestamps = false;
}
