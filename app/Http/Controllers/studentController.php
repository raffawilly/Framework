<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        $penerima = Auth::guard('student_guard')->user();
        $daftarNotif = [];
        $i = 0;
        foreach($penerima->notifications as $item){
            $item->markAsRead();

            $data2 = $item->data;
            // dd($data2);
            $tanggal = Carbon::parse($item->created_at)->format('d F Y');
            // $bukuPinjam = $data2['listbuku'][0]['bukus']['judul'];

            $hasil = "[".$item->created_at->diffForHumans()."] Pada tanggal $tanggal, Anda meminjam buku ";
            $daftarNotif[] = $hasil;
            // $i++;
            // dd($bukuPinjam);
        }

        return view('student.index',$data,[
            'daftarNotif' => $daftarNotif
        ]);
    }

    public function pinjamlist(Request $request)
    {

        $penerima = Auth::guard('student_guard')->user();

        $peminjaman = Peminjaman::where('kd_student','=', $penerima->kd_student)
                                ->where('status','=','0')->get();
        $peminjamans = [];
        $peminjamans['data'] = $peminjaman;
        // dd($peminjamans);

        $daftarNotif = [];
        $i = 0;
        foreach($penerima->notifications as $item){
            $item->markAsRead();

            $data2 = $item->data;
            // dd($data2);
            $tanggal = Carbon::parse($item->created_at)->format('d F Y');
            // $bukuPinjam = $data2['listbuku'][0]['bukus']['judul'];

            $hasil = "[".$item->created_at->diffForHumans()."] Pada tanggal $tanggal, Anda meminjam buku ";
            $daftarNotif[] = $hasil;
            // $i++;
            // dd($bukuPinjam);
        }

        return view('student.pinjamlist', $peminjamans,[
            'daftarNotif' => $daftarNotif
        ]);

    }

    public function kembalilist(Request $request)
    {
        $penerima = Auth::guard('student_guard')->user();

        $peminjaman = Peminjaman::where('kd_student','=', $penerima->kd_student)
                                ->where('status','=','1')->get();
        $peminjamans = [];
        $peminjamans['data'] = $peminjaman;

        $daftarNotif = [];
        $i = 0;
        foreach($penerima->notifications as $item){
            $item->markAsRead();

            $data2 = $item->data;
            // dd($data2);
            $tanggal = Carbon::parse($item->created_at)->format('d F Y');
            // $bukuPinjam = $data2['listbuku'][0]['bukus']['judul'];

            $hasil = "[".$item->created_at->diffForHumans()."] Pada tanggal $tanggal, Anda meminjam buku ";
            $daftarNotif[] = $hasil;
            // $i++;
            // dd($bukuPinjam);
        }

        return view('student.kembalilist',$peminjamans,[
            'daftarNotif' => $daftarNotif
        ]);

    }
}
