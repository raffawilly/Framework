<?php

namespace App\Http\Controllers;

use App\Mail\PinjamMail;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Peminjaman_item;
use App\Models\Penerbit;
use App\Models\Pengembalian;
use App\Models\student;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    //
    public function index()
    {
        # code...
        //total untuk dashboard admin
        $totalSiswa = student::all()->count();
        $totalKategori = Kategori::all()->count();
        $totalPenerbit = Penerbit::all()->count();
        $totalBuku = Buku::all()->count();
        $data = [];
        $data['totalSiswa']=$totalSiswa;
        $data['totalBuku']=$totalBuku;
        $data['totalPenerbit']=$totalPenerbit;
        $data['totalKategori']=$totalKategori;
        return view('admin.index',$data);
    }
    public function book_index(Request $req)
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $data = [];
        $data['penerbit'] = $penerbit;
        $data['kategori'] = $kategori;

        return view('admin.book_insert',$data);
    }

    public function book_insert(Request $req)
    {
        $req->validate(
            [
                'JudulBuku'  => "required",
                'Pengarang'  => "required",
                'Halaman'    => "required",
                'Jumlah'     => "required",
                'TahunTerbit'=> "required",
                'Gambar'     => "required"
            ],
            [
                'JudulBuku.required' => 'Harus mengisi Judul Buku',
                'Pengarang.required' => 'Harus mengisi Pengarang',
                'Halaman.required' => 'Harus mengisi Halaman',
                'Jumlah.required' => 'Harus mengisi Jumlah Buku',
                'TahunTerbit.required' => 'Harus mengisi Tahun Terbit Buku',
                'Gambar.required' => 'Harus ada sampul buku'
            ],
        );

        $buku = Buku::where('judul','=',$req->JudulBuku)
                    ->where('pengarang','=',$req->Pengarang)
                    ->first()
                    ;

        if ($buku == null) {
            $imageName = time().'.'.$req->Gambar->extension();

            $req->Gambar->move(public_path('img_buku'), $imageName);

            $result = Buku::create([
                'judul'       => $req->JudulBuku,
                'kd_kategori' => $req->Kategori,
                'kd_penerbit' => $req->Penerbit,
                'pengarang'   => $req->Pengarang,
                'halaman'     => $req->Halaman,
                'jumlah'      => $req->Jumlah,
                'th_terbit'   => $req->TahunTerbit,
                'gambar'      => $imageName
            ]);
        }else{
            $jumlahBaru = $buku->jumlah + $req->Jumlah;
            $buku->jumlah = $jumlahBaru;
            $result = $buku->save();
        }

        if($result){
            return redirect()->route('book_insert')->with('message', 'Insert Success');
        }else {
            return redirect()->route('book_insert')->with('message', 'Insert Failed');
        }

    }

    public function book_list(Request $req)
    {
        $buku = Buku::all();
        $bukus = [];
        $bukus['data'] = $buku;
        return view('admin.book_list', $bukus);
    }
    public function book_list_search(Request $req)
    {
        $buku = Buku::where('judul','like','%' . $req->search . '%')->get();
        $bukus = [];
        $bukus['data'] = $buku;
        return view('admin.book_list', $bukus);
    }
    public function ubah_buku(Request $req)
    {
        $buku = Buku::find($req->id);
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $data = [];
        $data['penerbit'] = $penerbit;
        $data['kategori'] = $kategori;
        $data['buku']=$buku;
        return view('admin.book_update', $data);
    }
    public function do_ubah_buku(Request $req)
    {
     $book = Buku::find($req->id); // dapatkan buku ke 99
        $book->judul = $req->JudulBuku;
        $book->kd_kategori = $req->Kategori;
        $book->kd_penerbit = $req->Penerbit;
        $book->pengarang = $req->Pengarang;
        $book->halaman = $req->Halaman;
        $book->jumlah = $req->Jumlah;
        $book->th_terbit = $req->TahunTerbit;
        $result = $book->save(); // untuk ngesave ke database
        if($result){
            return redirect()->route('book_list')->with('message', 'Update Success');
        }else {
            return redirect()->route('book_list')->with('message', 'Update Failed');
        }
    }
    public function hapus_buku(Request $req)
    {
        $buku = Buku::find($req->id);
        $result = $buku->delete();

        if($result){
            return redirect()->route('book_list')->with('message', 'Delete Success');
        }else {
            return redirect()->route('book_list')->with('message', 'Delete Failed');
        }
    }

    public function book_kategori(Request $req)
    {
        $kategori = Kategori::all();
        $data = [];
        $data['kategori'] = $kategori;
        return view('admin.book_kategori', $data);
    }

    public function search_kategori(Request $req)
    {
        $kategori = Kategori::where('nm_kategori','like','%' . $req->search . '%')->get();
        $data = [];
        $data['kategori'] = $kategori;
        return view('admin.book_kategori', $data);
    }

    public function insert_kategori(Request $req)
    {
        $req->validate(
            [
                'NamaKategori' => "required",
            ],
            [
                'NamaKategori.required' => 'Harus mengisi kategori',
            ],
        );

        $result = Kategori::create([
            'nm_kategori' => $req->NamaKategori
        ]);
        if($result){
            return redirect()->route('book_kategori')->with('message', 'Insert Success');
        }else {
            return redirect()->route('book_kategori')->with('message', 'Insert Failed');
        }
    }

    public function hapus_kategori(Request $req)
    {
        $kategori = Kategori::find($req->id);
        $result = $kategori->delete();

        if($result){
            return redirect()->route('book_kategori')->with('message', 'Delete Success');
        }else {
            return redirect()->route('book_kategori')->with('message', 'Delete Failed');
        }

    }

    public function book_penerbit(Request $req)
    {
        $penerbit = Penerbit::all();
        $data = [];
        $data['penerbit'] = $penerbit;
        return view('admin.book_penerbit', $data);
    }
    public function search_penerbit(Request $req)
    {
        $penerbit = Penerbit::where('nm_penerbit','like','%' . $req->search . '%')->get();
        $data = [];
        $data['penerbit'] = $penerbit;
        return view('admin.book_penerbit', $data);
    }
    public function insert_penerbit(Request $req)
    {
        $req->validate(
                [
                    'NamaPenerbit' => "required",
                ],
                [
                    'NamaPenerbit.required' => 'Harus mengisi nama penerbit',
                ],
            );

        $result = Penerbit::create([
            'nm_penerbit' => $req->NamaPenerbit
        ]);

        if($result){
            return redirect()->route('book_penerbit')->with('message', 'Insert Success');
        }else {
            return redirect()->route('book_penerbit')->with('message', 'Insert Failed');
        }
    }

    public function hapus_penerbit(Request $req)
    {
        $penerbit = Penerbit::find($req->id);
        $result = $penerbit->delete();

        if($result){
            return redirect()->route('book_penerbit')->with('message', 'Delete Success');
        }else {
            return redirect()->route('book_penerbit')->with('message', 'Delete Failed');
        }

    }
    public function student_index()
    {
        return view('admin.siswa_insert');
    }
    public function student_insert(Request $req)
    {
        $req->validate(
            [
                'Username'    => "required",
                'Password'    => "required",
                'nm_student'  => "required",
                'nisn'        => "required",
                'kelamin'     => "required",
                'Agama'       => "required",
                'tempatLahir' => "required",
                'tanggalLahir'=> "required",
                'Alamat'      => "required",
                'nomorTelpon' => "required",
                'Foto'        => "required"
            ],
            [
                'Username.required' => 'Harus mengisi username',
                'Password.required' => 'Harus mengisi password',
                'nm_student.required' => 'Harus mengisi nama siswa',
                'nisn.required' => 'Harus mengisi Nisn',
                'kelamin.required' => 'Harus mengisi Kelamin',
                'Agama.required' => 'Harus mengisi Agama',
                'tempatLahir.required' => 'Harus mengisi Tempat Lahir',
                'tanggalLahir.required' => 'Harus mengisi Tanggal Lahir',
                'Alamat.required' => 'Harus mengisi Alamat',
                'nomorTelpon.required' => 'Harus mengisi Nomor Telpon',
                'Foto.required' => 'Harus ada foto siswa'
            ],
        );
            $imageName = time().'.'.$req->Foto->extension();

            $req->Foto->move(public_path('img_student'), $imageName);

            $result = student::create([
                'username'       => $req->Username,
                'password' => Hash::make($req->Password),
                'nm_student' => $req->nm_student,
                'nisn' => $req->nisn,
                'kelamin'   => $req->kelamin,
                'agama'     => $req->Agama,
                'tempat_lahir'      => $req->tempatLahir,
                'tanggal_lahir'   => $req->tanggalLahir,
                'alamat' => $req->Alamat,
                'no_telepon' => $req->nomorTelpon,
                'email' => $req->email,
                'foto'      => $imageName
            ]);

        if($result){
            return redirect()->route('student_insert')->with('message', 'Insert Success');
        }else {
            return redirect()->route('student_insert')->with('message', 'Insert Failed');
        }
    }

    public function hapus_student(Request $req)
    {
        $student = student::withTrashed()->find($req->id); // dapatkan buku ke 99
        // dd($book);
        if($student->trashed()){
            // apakah buku ini sudah pernah disoft delete?
            // jika ya, maka recover
            $result = $student->restore();
        }else{
            $result = $student->delete();
        }

        if($result){
            return redirect()->route('student_list')->with('message', 'Delete Success');
        }else {
            return redirect()->route('student_list')->with('message', 'Delete Failed');
        }

    }

    public function student_list(Request $req)
    {
        $student = student::withTrashed()->get();
        $students = [];
        $students['data'] = $student;
        return view('admin.student_list', $students);
    }

    public function student_list_search(Request $req)
    {
        $student = student::withTrashed()->where('nm_student','like','%' . $req->search . '%')->get();
        $students = [];
        $students['data'] = $student;
        return view('admin.student_list', $students);
    }

    public function ubah_student(Request $req)
    {
        $student = student::find($req->kd_student);
        $data = [];
        $data['student']=$student;
        return view('admin.student_update', $data);
    }
    public function do_ubah_student(Request $req)
    {
     $student = student::find($req->kd_student); // dapatkan buku ke 99
        $student->username = $req->Username;
        $student->nm_student = $req->nm_student;
        $student->nisn = $req->nisn;
        $student->kelamin = $req->kelamin;
        $student->agama = $req->Agama;
        $student->tempat_lahir = $req->tempatLahir;
        $student->tanggal_lahir = $req->tanggalLahir;
        $student->alamat = $req->Alamat;
        $student->no_telepon = $req->nomorTelpon;
        $result = $student->save(); // untuk ngesave ke database
        if($result){
            return redirect()->route('student_list')->with('message', 'Update Success');
        }else {
            return redirect()->route('student_list')->with('message', 'Update Failed');
        }
    }

    //PEMINJAMAN//
    public function peminjaman_index()
    {
        $student = student::all();
        $buku = Buku::all();
        $data = [];
        $data['student'] = $student;
        $data['buku'] = $buku;
        return view("admin.peminjaman", $data);
    }

    public function peminjaman_post(Request $req)
    {
        $req->validate(
            [
                'tgl_peminjaman'=> "required",
                'kd_student'    => "required",
                'keterangan'    => "required",
                'lamaPinjam'    => "required",
                'status'        => "required",
                'kodeBuku'      => "required"
            ],
            [
                'tgl_peminjaman.required' => 'Harus mengisi Tanggal Peminjaman',
                'kd_student.required' => 'Harus memilih nama siswa',
                'keterangan.required' => 'Harus mengisi keterangan',
                'lamaPinjam.required' => 'Harus mengisi lama pinjam',
                'status.required' => 'Harus memilih status',
                'kodeBuku.required' => 'Harus memilih buku'
            ],
        );

        $buku=Buku::find($req->kodeBuku);
        if($buku->jumlah > 0){

            $result = Peminjaman::create([
                'tgl_pinjam'       => $req->tgl_peminjaman,
                'kd_student' => $req->kd_student,
                'keterangan' => $req->keterangan,
                'lama_pinjam' => $req->lamaPinjam,
                'status'   => $req->status,
                'kd_admin'     => Auth::guard('admin_guard')->user()->kd_admin,
                'kd_buku'  => $req->kodeBuku
            ]);
            $CariKdPinjam = Peminjaman::max('no_pinjam');

            $result2 = Peminjaman_item::create([
                'kd_student' => $req->kd_student,
                'no_pinjam'  => $CariKdPinjam,
                'kd_buku' => $req->kodeBuku,
                'jumlah' => '1'
            ]);

            //MENGURANGI STOK BUKU DI DB
            $buku->jumlah=$buku->jumlah - 1;
            $result=$buku->save();

            if($result && $result2 ){
                $listBuku = Peminjaman::where('kd_student','=',$req->kd_student)->get();
                $student = student::find($req->kd_student);
                Mail::to($student->email)->send(new PinjamMail($student, $listBuku));
                return redirect()->route('peminjaman_index')->with('message', 'Insert Success');

            }else {
                return redirect()->route('peminjaman_index')->with('failed', 'Insert Failed');
            }
        }
        else{
            return redirect()->route('peminjaman_index')->with('failed', 'Stock Empty');
        }



    }

    public function peminjaman_list()
    {
        $peminjaman = Peminjaman::all();
        $peminjamans = [];
        $peminjamans['data'] = $peminjaman;
        return view("admin.peminjaman_list",$peminjamans);
    }

    public function ubah_peminjaman(Request $req)
    {
        $peminjaman = Peminjaman::find($req->id);
        $student = student::all();
        $buku = Buku::all();
        $data = [];
        $data['student'] = $student;
        $data['buku'] = $buku;
        $data['peminjaman'] = $peminjaman;
        return view("admin.peminjaman_update", $data);
    }

    public function do_ubah_peminjaman(Request $req)
    {
     $peminjaman = Peminjaman::find($req->id); // dapatkan id dari url untuk mencari no_pinjam
        $peminjaman->tgl_pinjam = $req->tgl_peminjaman;
        $peminjaman->kd_student = $req->kd_student;
        $peminjaman->keterangan = $req->keterangan;
        $peminjaman->lama_pinjam = $req->lamaPinjam;
        $peminjaman->status = $req->status;
        $peminjaman->kd_buku = $req->kodeBuku;
        $result = $peminjaman->save(); // untuk ngesave ke database
        if($result){
            return redirect()->route('peminjaman_list')->with('message', 'Update Success');
        }else {
            return redirect()->route('peminjaman_list')->with('message', 'Update Failed');
        }
    }

    public function ubah_pengembalian(Request $req)
    {
        $pengembalian = Pengembalian::find($req->id);
        $student = student::all();
        $buku = Buku::all();
        $data = [];
        $data['student'] = $student;
        $data['buku'] = $buku;
        $data['pengembalian'] = $pengembalian;
        return view("admin.pengembalian_update", $data);
    }

    public function do_ubah_pengembalian(Request $req)
    {
     $pengembalian = Pengembalian::find($req->id); // dapatkan id dari url untuk mencari no_pinjam
        $pengembalian->no_pinjam = $req->no_pinjam;
        $pengembalian->tgl_kembali = $req->tgl_pengembalian;
        $pengembalian->denda = $req->denda;
        $pengembalian->kd_student = $req->kd_student;
        $pengembalian->kd_admin = $req->kd_admin;
        $pengembalian->kd_buku = $req->kodeBuku;
        $result = $pengembalian->save(); // untuk ngesave ke database
        if($result){
            return redirect()->route('pengembalian_list')->with('message', 'Update Success');
        }else {
            return redirect()->route('pengembalian_list')->with('message', 'Update Failed');
        }
    }

    public function pengembalian_index(Request $req)
    {

        $pinjam = Peminjaman::all();
        $data = [];
        $data['pinjam'] = $pinjam;

        return view("admin.pengembalian", $data);

    }

    public function pengembalian_get(Request $req)
    {
        $pengembalian = Peminjaman::find($req->id);
        // dd($pengembalian);
            if ($pengembalian != null) {
                $pengembalian->status = 1;

                $result = $pengembalian->save(); // untuk ngesave ke database
                $result = Pengembalian::create([
                    'no_pinjam'       => $pengembalian->no_pinjam,
                    'tgl_kembali' => date("Y-m-d"),
                    'kd_admin'     => Auth::guard('admin_guard')->user()->kd_admin
                ]);
                 //MENGURANGI STOK BUKU DI DB
                $buku=Buku::find($pengembalian->kd_buku);
                $buku->jumlah=$buku->jumlah + 1;
                $buku->save();


                if($result){
                    return redirect()->route('pengembalian_list')->with('message', 'Berhasil Dikembalikan');
                }else {
                    return redirect()->route('pengembalian_list')->with('message', 'Gagal Dikembalikan');
                }
            }
            $pengembalian = Pengembalian::all();
            $pengembalians = [];
            $pengembalians['data'] = $pengembalian;
            return view("admin.pengembalian_list",$pengembalians);


    }

    public function pengembalian_post(Request $req)
    {
        $pengembalian = Peminjaman::find($req->id); // dapatkan id dari url untuk mencari no_pinjam
        // dd("$pengembalian");
        $pengembalian->status = "1";

        $result = $pengembalian->save(); // untuk ngesave ke database
        $result = Pengembalian::create([
            'no_pinjam'       => $pengembalian->no_pinjam,
            'tgl_kembali' => date("Y-m-d"),
            'kd_admin'     => Auth::guard('admin_guard')->user()->kd_admin
        ]);

        if($result){
            return redirect()->route('pengembalian_list')->with('message', 'Update Success');
        }else {
            return redirect()->route('pengembalian_list')->with('message', 'Update Failed');
        }
    }

    public function pengembalian_list()
    {
        $pengembalian = Pengembalian::all();
        $pengembalians = [];
        $pengembalians['data'] = $pengembalian;
        return view("admin.pengembalian_list",$pengembalians);
    }


}
