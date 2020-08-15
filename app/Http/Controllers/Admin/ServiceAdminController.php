<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServiceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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

        (isset($input['icon'])) ? $namaThumbnail = str_random().'.'.$input['icon']->getClientOriginalExtension() : $namaThumbnail = null;

        Service::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'icon' => $namaThumbnail
        ]);
        
        (isset($input['icon'])) ? $input['icon']->move(public_path('icon'), $namaThumbnail) : null ;

        alert()->success('Layanan Berhasil Dibuat !', '...');

        return redirect()->action(
            'Admin\ServiceAdminController@index'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Service::where('id', $id)->first();

        return view('admin.services.show', compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::where('id', $id)->first();

        return view('admin.services.edit', compact('services'));
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
        $input = $request->all();

        $services = Service::where('id', $id)->first();

        if (isset($input['icon'])) {
            $namaThumbnail = str_random().'.'.$input['icon']->getClientOriginalExtension();
            
            if (isset($services->icon)) {
                unlink(public_path('icon/'.$services->icon));
            }
            $input['icon']->move(public_path("icon/"), $namaThumbnail);  

            $services->update([
                'title' => $input['title'],
                'description' => $input['description'],
                'icon' => $namaThumbnail
            ]);
        }else{
            $services->update([
                'title' => $input['title'],
                'description' => $input['description']
            ]);
        }

        alert()->success('Layanan Berhasil Diperbarui !', '...');
        
        return redirect()->action(
            'Admin\ServiceAdminController@index'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::where('id', $id)->first();
        if (isset($services->icon)) {
            unlink(public_path('icon/'.$services->icon));
        }

        Service::destroy($id);

        alert()->success('Layanan Berhasil Dihapus !', '...');

        return redirect()->action(
            'Admin\ServiceAdminController@index'
        );
    }
}
