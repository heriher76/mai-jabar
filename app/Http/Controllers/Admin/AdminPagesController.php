<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class AdminPagesController extends Controller
{
    public function index()
    {
    	Alert::message('Selamat Datang!');

    	return view('admin.index');
    }
}
