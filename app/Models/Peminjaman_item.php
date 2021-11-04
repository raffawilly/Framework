<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_item extends Model
{
    use HasFactory;

    protected $table      = "peminjaman_item";
    protected $primaryKey = "no_pinjam_item";
    public $incrementing  = true;
    public $timestamps    = false;

    protected $fillable =[
        'no_pinjam',
        'kd_buku',
        'jumlah'
    ];

    public function Bukus()
    {
        return $this->belongsTo(Buku::class,'kd_buku','kd_buku');
    }
}
