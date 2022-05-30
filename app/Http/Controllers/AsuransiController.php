<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asuransi;

class AsuransiController extends Controller
{
    public function index()
    { 
        $asuransis = Asuransi::all();
        
        return view('dashboard.datamaster.asuransi',compact('asuransis'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_asuransi' => 'required|max:255',
            'biaya' => 'required',
            'keterangan' => 'required'
        ]);
        $show = Asuransi::create($validatedData);
   
        return redirect('/datamaster/asuransi')->with('success', 'Game is successfully saved');
    }

    
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
        //
    }
}
