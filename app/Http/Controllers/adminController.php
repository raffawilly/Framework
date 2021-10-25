<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('admin.index');
    }
    public function book_insert(Request $request)
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $data = [];
        $data['penerbit'] = $penerbit;
        $data['kategori'] = $kategori;

        return view('admin.book_insert',$data);
    }
    public function book_kategori(Request $request)
    {
        $kategori = Kategori::all();
        $data = [];
        $data['kategori'] = $kategori;
        return view('admin.book_kategori', $data);
    }
    public function insert_kategori(Request $req)
    {
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

    public function book_penerbit(Request $request)
    {
        $penerbit = Penerbit::all();
        $data = [];
        $data['penerbit'] = $penerbit;
        return view('admin.book_penerbit', $data);
    }

    public function insert_penerbit(Request $req)
    {
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
}
