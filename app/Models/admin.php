<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasFactory;

    // INISIALISASI DIBAWAH INI CASE SENSITIVE
    protected $table      = "admin";
    protected $primaryKey = "kd_admin";
    public $incrementing  = true;
    public $timestamps    = false;
}
