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
                        ->where('status' ,'=',0)->count();
        $bukuDikembalikan = Peminjaman::where('kd_student' ,'=',Auth::guard('student_guard')->user()->kd_student)
                        ->where('status' ,'=',1)->count();
        $data = [];
        $data['bukuDipinjam']=$bukuDipinjam;
        $data['bukuDikembalikan']=$bukuDikembalikan;
        return view('student.index',$data);
    }
}
