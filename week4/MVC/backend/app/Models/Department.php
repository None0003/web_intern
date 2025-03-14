<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'phong_ban';
    protected $primaryKey = 'id_phong_ban';
    protected $fillable = ['ten_phong_ban'];
    public $timestamps = false;
}
