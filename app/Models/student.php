<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table      = "student";
    protected $primaryKey = "username";
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
        'foto'
    ];

}
