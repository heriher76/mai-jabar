<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StructureOrganization;
use Alert;

class StructureOrganizationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structures = StructureOrganization::all();

        return view('admin.profile.structure-organization', compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create-people');
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

        (isset($input['image'])) ? $namaThumbnail = str_random().'.'.$input['image']->getClientOriginalExtension() : $namaThumbnail = null;

        StructureOrganization::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'title' => $input['title'],
            'ttl' => $input['ttl'],
            'religion' => $input['religion'],
            'schools' => $input['schools'],
            'organizations' => $input['organizations'],
            'jobs' => $input['jobs'],
            'achievements' => $input['achievements'],
            'description' => $input['description'],
            'image' => $namaThumbnail
        ]);
        
        (isset($input['image'])) ? $input['image']->move(public_path('structureorganization'), $namaThumbnail) : null ;

        alert()->success('Anggota Organisasi Berhasil Ditambahkan !', '...');

        return redirect()->action(
            'Admin\StructureOrganizationAdminController@index'
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
        $people = StructureOrganization::where('id', $id)->first();

        return view('admin.profile.edit-people', compact('people'));
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

        $people = StructureOrganization::where('id', $id)->first();

        if (isset($input['image'])) {
            $namaThumbnail = str_random().'.'.$input['image']->getClientOriginalExtension();
            
            if (isset($people->image)) {
                unlink(public_path('structureorganization/'.$people->image));
            }
            $input['image']->move(public_path("structureorganization/"), $namaThumbnail);  

            $people->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'title' => $input['title'],
                'ttl' => $input['ttl'],
                'religion' => $input['religion'],
                'schools' => $input['schools'],
                'organizations' => $input['organizations'],
                'jobs' => $input['jobs'],
                'achievements' => $input['achievements'],
                'description' => $input['description'],
                'image' => $namaThumbnail
            ]);
        }else{
            $people->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'title' => $input['title'],
                'ttl' => $input['ttl'],
                'religion' => $input['religion'],
                'schools' => $input['schools'],
                'organizations' => $input['organizations'],
                'jobs' => $input['jobs'],
                'achievements' => $input['achievements'],
                'description' => $input['description']
            ]);
        }

        alert()->success('Profil Anggota Berhasil Diperbarui !', '...');
        
        return redirect()->action(
            'Admin\StructureOrganizationAdminController@index'
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
        $people = StructureOrganization::where('id', $id)->first();
        if (isset($people->image)) {
            unlink(public_path('structureorganization/'.$people->image));
        }

        StructureOrganization::destroy($id);

        alert()->success('Anggota Berhasil Dihapus !', '...');

        return redirect()->action(
            'Admin\StructureOrganizationAdminController@index'
        );
    }
}
