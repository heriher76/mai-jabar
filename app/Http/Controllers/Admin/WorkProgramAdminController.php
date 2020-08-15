<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkProgram;

class WorkProgramAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workPrograms = WorkProgram::all();

        return view('admin.work-program.index', compact('workPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work-program.create');
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
dd($input);
        WorkProgram::create([
            'name' => $input['name'],
            'description' => $input['description']
        ]);
        
        alert()->success('Program Kerja Berhasil Dibuat !', '...');

        return redirect()->action(
            'Admin\WorkProgramAdminController@index'
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
        $workPrograms = WorkProgram::where('id', $id)->first();

        return view('admin.work-program.show', compact('workPrograms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workPrograms = WorkProgram::where('id', $id)->first();

        return view('admin.work-program.edit', compact('workPrograms'));
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

        $workPrograms = WorkProgram::where('id', $id)->first();

        $workPrograms->update([
            'name' => $input['name'],
            'description' => $input['description']
        ]);

        alert()->success('Program Kerja Berhasil Diperbarui !', '...');
        
        return redirect()->action(
            'Admin\WorkProgramAdminController@index'
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
        WorkProgram::destroy($id);

        alert()->success('Program Kerja Berhasil Dihapus !', '...');

        return redirect()->action(
            'Admin\WorkProgramAdminController@index'
        );
    }
}
