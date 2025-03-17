<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'luong';
    protected $fillable = ['id_nhan_vien', 'so_tien_luong', 'thang_nhan_luong'];
    public $timestamps = false;

    public function employee() {
        return $this->belongsTo(Employee::class, 'id_nhan_vien');
    }
}
