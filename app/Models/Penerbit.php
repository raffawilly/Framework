<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $table      = "penerbit";
    protected $primaryKey = "kd_penerbit";
    public $incrementing  = true;
    public $timestamps    = false;
    protected $fillable =[
        'nm_penerbit'
    ];
}
