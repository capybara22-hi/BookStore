<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoanhthuController extends Controller
{
    public function index()
    {
        return view('admin.doanhthu');
    }
}
