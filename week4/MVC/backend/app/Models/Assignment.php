<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'nhan_vien_phong_ban';
    protected $fillable = ['id_phong_ban', 'id_nhan_vien', 'chuc_vu'];
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_nhan_vien');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'id_phong_ban');
    }
}
