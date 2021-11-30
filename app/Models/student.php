<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class student extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table      = "student";
    protected $primaryKey = "kd_student";
    public $incrementing  = false;
    public $timestamps    = false;
    protected $fillable =[
        'username',
        'password',
        'nm_student',
        'nisn',
        'kelamin',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'email',
        'foto'
    ];

}
