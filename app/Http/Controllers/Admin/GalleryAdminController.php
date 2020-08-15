<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use Alert;

class GalleryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->input('type') == 'image') {
            return view('admin.gallery.create-image');
        }else if (request()->input('type') == 'video') {
            return view('admin.gallery.create-video');
        }else{
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        if ($input['type'] == 'image') {
            (isset($input['name'])) ? $namaPhoto = str_random().'.'.$input['name']->getClientOriginalExtension() : $namaPhoto = null;
            
            Gallery::create([
                'name' => $namaPhoto,
                'title' => $input['title'],
                'desc' => $input['desc'],   
                'type' => 'image'
            ]);

            (isset($input['name'])) ? $input['name']->move(public_path('galeri'), $namaPhoto) : null;
            Alert::success('Berhasil !', 'Photo Sudah Ditambahkan');
        } else if ($input['type'] == 'video') {
            $video_url = $input['name'];
            $video_url = explode('=', $video_url);
            $video_url = $video_url['1'];

            Gallery::create([
                'name' => $video_url,
                'type' => 'video'
            ]);
            Alert::success('Berhasil !', 'Video Sudah Ditambahkan');
        }

        return redirect('/admin/gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        if($gallery->type == 'image' && isset($gallery->name)) {
            unlink(public_path('galeri/'.$gallery->name));
        }

        Gallery::destroy($id);

        return back();
    }
}
