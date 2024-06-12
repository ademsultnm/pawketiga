<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
// update library
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    // CREATE READ DATA
    // buat code untuk menampilkan dashboard 
    // setelah buat disini, langsung ke routes > web.php

    // tambahkan request untuk mengakses data nya
    public function adminIndex(Request $request){

        $allData = mahasiswa::all();
        // menambahkan variabel data=>alldata untuk menampung semua data yang ada di index.blade
        return view('index', ['data'=>$allData]); 
    }

    public function adminAdd(){
        return view('add');
    }

    // tambahkan parameter ($id) agar bisa mengakses id yang sudah terdaftar di index
    public function adminEdit(){

        // buat fungsi untuk mencari id yang sudah terinput
        $dataEdit = mahasiswa::find($id);
        return view('edit', ['data'=>$dataEdit]);
    }

    // CREATE DATA
    public function AddAdmin(Request $request) 
    {
        // menambahkan data disini

        // menambahkan validasi
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nbi' => 'required|integer|max:20',
            'praktikum' => 'required|string|max:100',
            'sesi' => 'required|integer|max:50',
        ]);

        // buat variabel baru untuk menampung data nya
        $newData = new mahasiswa();

        // deklarasikan/inisialisasi data model yang tersimpan di folder migration -> mahasiswas_table
        $newData->nama = $request->nama;
        $newData->nbi = $request->nbi;
        $newData->praktikum = $request->praktikum;
        $newData->sesi = $request->sesi;

        // jangan lupa save data baru nya
        $newData->save();

        // jangan lupa buat fungsi untuk menyimpan tampilan dashboardnya
        return redirect('/adminIndex');
    }

    // UPDATE DATA
    public function EditAdmin(Request $request)
    {
        // menambahkan validasi input
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nbi' => 'required|integer|max:20',
            'praktikum' => 'required|string|max:100',
            'sesi' => 'required|integer|max:50',
        ]);

        // kita mencari 'id', lalu merequest ke id, setelah ketemu lsg update
        // mahasiswa::where('id',$request->id)->update([
        mahasiswa::where('id',$request->id)->update([

            'nama'=>$request->nama,
            'nbi'=>$request->nbi,
            'praktikum'=>$request->praktikum,
            'sesi'=>$request->sesi,

        ]);

        // lalu membuat return tampilannya
        return redirect('/adminIndex');
    }
    
    // DELETE DATA
    // memanggil sesuatu yang akan kita hapus, misal lewat ID nya
    public function DeleteAdmin($id)
    {
        // buat variabel akses
        $dataDelete = mahasiswa::find($id);
        $dataDelete->delete();
        // buat fungsi nya
        return redirect('/adminIndex');
    }

    // setelah selesai semua, kita implementasikan ke halaman view nya (file html)
}
