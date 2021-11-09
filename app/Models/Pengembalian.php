<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table      = "pengembalian";
    protected $primaryKey = "no_kembali";
    public $incrementing  = true;
    public $timestamps    = false;

    protected $fillable =[
        'no_pinjam',
        'tgl_kembali',
        'kd_student',
        'denda',
        'kd_admin',
        'kd_buku'
    ];

    public function Students()
    {
        return $this->belongsTo(student::class,'kd_student','kd_student');
    }

    public function Admins()
    {
        return $this->belongsTo(admin::class,'kd_admin','kd_admin');
    }

    public function Bukus()
    {
        return $this->belongsTo(Buku::class,'kd_buku','kd_buku');
    }
}
