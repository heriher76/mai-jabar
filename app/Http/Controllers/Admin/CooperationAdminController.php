<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cooperation;

class CooperationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperations = Cooperation::all();

        return view('admin.cooperations.index', compact('cooperations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cooperations.create');
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

        (isset($input['thumbnail'])) ? $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension() : $namaThumbnail = null;

        Cooperation::create([
            'name' => $input['name'],
            'date' => $input['date'],
            'description' => $input['description'],
            'thumbnail' => $namaThumbnail
        ]);
        
        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('kerja-sama'), $namaThumbnail) : null ;

        alert()->success('Kerja Sama Berhasil Ditambahkan !', '...');

        return redirect()->action(
            'Admin\CooperationAdminController@index'
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
        $cooperations = Cooperation::where('id', $id)->first();

        return view('admin.cooperations.show', compact('cooperations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cooperations = Cooperation::where('id', $id)->first();

        return view('admin.cooperations.edit', compact('cooperations'));
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

        $cooperations = Cooperation::where('id', $id)->first();

        if (isset($input['thumbnail'])) {
            $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension();
            
            if (isset($cooperations->thumbnail)) {
                unlink(public_path('kerja-sama/'.$cooperations->thumbnail));
            }
            $input['thumbnail']->move(public_path("kerja-sama/"), $namaThumbnail);  

            $cooperations->update([
                'name' => $input['name'],
                'date' => $input['date'],
                'description' => $input['description'],
                'thumbnail' => $namaThumbnail
            ]);
        }else{
            $cooperations->update([
                'name' => $input['name'],
                'date' => $input['date'],
                'description' => $input['description']
            ]);
        }

        alert()->success('Kerja Sama Berhasil Diperbarui !', '...');
        
        return redirect()->action(
            'Admin\CooperationAdminController@index'
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
        $cooperations = Cooperation::where('id', $id)->first();
        if (isset($cooperations->thumbnail)) {
            unlink(public_path('kerja-sama/'.$cooperations->thumbnail));
        }

        Cooperation::destroy($id);

        alert()->success('Kerja Sama Berhasil Dihapus !', '...');

        return redirect()->action(
            'Admin\CooperationAdminController@index'
        );
    }
}
