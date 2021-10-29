<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\student;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('admin.index');
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

            $req->Gambar->move(public_path('img'), $imageName);

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

            $req->Foto->move(public_path('img'), $imageName);

            $result = student::create([
                'username'       => $req->Username,
                'password' => $req->Password,
                'nm_student' => $req->nm_student,
                'nisn' => $req->nisn,
                'kelamin'   => $req->kelamin,
                'agama'     => $req->Agama,
                'tempat_lahir'      => $req->tempatLahir,
                'tanggal_lahir'   => $req->tanggalLahir,
                'alamat' => $req->Alamat,
                'no_telepon' => $req->nomorTelpon,
                'foto'      => $imageName
            ]);

        if($result){
            return redirect()->route('student_insert')->with('message', 'Insert Success');
        }else {
            return redirect()->route('student_insert')->with('message', 'Insert Failed');
        }

    }
}
