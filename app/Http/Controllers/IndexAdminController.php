<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonHang;

class IndexAdminController extends Controller
{
    public function index(){
        $nguoi_dung = User::all();
        $don_hang = DonHang::all();

        return view('admin.index', compact('nguoi_dung', 'don_hang'));
    }
}
