<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    // menambahkan baris code untuk memproteksi data yang ada di database
    protected $table = "mahasiswas";
}
