<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        //menampilkan data produk dihalamam utama user dengan limit 10 data
        //untuk di carousel
        $data = array(
            'produks' => DB::table('products')->limit(10)->get(),
            'lokasi' => DB::table('alamat_toko')->where('id', 1)->first()
        );
        return view('user.display2', $data);
    }

    
}