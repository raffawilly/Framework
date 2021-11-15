<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class studentController extends Controller
{
    //
    public function index()
    {
        # code...
        $bukuDipinjam = Peminjaman::where('kd_student' ,'=',Auth::guard('student_guard')->user()->kd_student)
        ->where('status' ,'=',0)->count()
        ;
        $data = [];
        $data['bukuDipinjam']=$bukuDipinjam;
        return view('student.index',$data);
    }
}
