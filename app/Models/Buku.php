<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory;

    protected $table      = "buku";
    protected $primaryKey = "kd_buku";
    public $incrementing  = true;
    public $timestamps    = false;

    protected $fillable =[
        'judul',
        'kd_kategori',
        'kd_penerbit',
        'pengarang',
        'halaman',
        'jumlah',
        'th_terbit',
        'gambar'
    ];

    public function Kategoris()
    {
        return $this->belongsTo(Kategori::class,'kd_kategori','kd_kategori');
    }

    public function Penerbits()
    {
        return $this->belongsTo(Penerbit::class,'kd_penerbit','kd_penerbit');
    }
}
