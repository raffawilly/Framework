<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table      = "peminjaman";
    protected $primaryKey = "no_pinjam";
    public $incrementing  = true;
    public $timestamps    = false;

    protected $fillable =[
        'tgl_pinjam',
        'kd_student',
        'keterangan',
        'lama_pinjam',
        'status',
        'kd_user',
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
