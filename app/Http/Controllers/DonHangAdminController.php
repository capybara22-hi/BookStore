<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonHang;

class DonHangAdminController extends Controller
{
    public function index(){
        $nguoi_dung = User::all();
        $don_hang = DonHang::all();

        return view('admin.donhangadmin', compact('nguoi_dung', 'don_hang'));
    }
}
