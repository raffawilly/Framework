<?php

namespace App\Http\Controllers;

use App\Mail\PinjamMail;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function kirim(Request $request)
    {
        # code...
        $listBuku = Peminjaman::where('kd_student');
        $emailStudent = student::find($listBuku);
    }

    public function preview(Request $request)
    {
        // $user =  Auth::guard('adm_guard')->user();

        $listBuku = Peminjaman::where('kd_student','=','1')->get();
        $student = student::find('1');
        // $listBuku = Peminjaman::all();
        return new PinjamMail($student, $listBuku);
    }
}
