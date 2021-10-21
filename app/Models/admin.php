<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin extends Model
{
    use HasFactory;

    // INISIALISASI DIBAWAH INI CASE SENSITIVE
    protected $table      = "admin";
    protected $primaryKey = "kd_admin";
    public $incrementing  = true;
    public $timestamps    = false;
}
