<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Welcome;
use Alert;

class WelcomeAdminController extends Controller
{
	public function index()
	{
		$welcome = Welcome::first();

    	return view('admin.home.welcome', compact('welcome'));
	}
	public function update($id, Request $request)
	{
		$input = $request->all();

        $welcome = Welcome::first();
        
        if($welcome != null) {
        	if (isset($input['image'])) {
        		(isset($input['image'])) ? $namaThumbnail = str_random().'.'.$input['image']->getClientOriginalExtension() : $namaThumbnail = null;
        		$welcome->update([
	                'name' => $input['name'],
	                'title' => $input['title'],
	                'description' => $input['description'],
	                'image' => $namaThumbnail
	            ]);
	            (isset($input['image'])) ? $input['image']->move(public_path('ucapan'), $namaThumbnail) : null ;
        	}else{
        		$welcome->update([
	                'name' => $input['name'],
	                'title' => $input['title'],
	                'description' => $input['description']
	            ]);
        	}
        }else{
        	if (isset($input['image'])) {
        		(isset($input['image'])) ? $namaThumbnail = str_random().'.'.$input['image']->getClientOriginalExtension() : $namaThumbnail = null;
        		Welcome::create([
	                'name' => $input['name'],
	                'title' => $input['title'],
	                'description' => $input['description'],
	                'image' => $namaThumbnail
	            ]);
	            (isset($input['image'])) ? $input['image']->move(public_path('ucapan'), $namaThumbnail) : null ;
        	}else{
        		Welcome::create([
	                'name' => $input['name'],
	                'title' => $input['title'],
	                'description' => $input['description']
	            ]);
        	}
        }

        Alert::success('Berhasil !', 'Ucapan Selamat Datang Sudah Diperbaharui'); 

        return redirect()->action(
            'Admin\WelcomeAdminController@index'
        );
	}
}
