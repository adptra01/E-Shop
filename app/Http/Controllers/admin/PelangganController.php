<?php

namespace App\Http\Controllers\admin;

use App\Alamat;
use App\City;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function customer(){
        $customer = User::where('users.role', '=', 'customer')->get();

        return view('admin.pelanggan.customer', compact('customer'));

    }

    public function detail($id)
    {
        $pelanggan = User::where('id', $id)->first();

        $order = Order::where('user_id', $pelanggan->id)->get();

        $address = Alamat::where('user_id', $pelanggan->id)->first();

        return view('admin.pelanggan.userDetail', [
            'pelanggan' => $pelanggan,
            'order' => $order,
            'address' => $address,
        ]);
    }
}