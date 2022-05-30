<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;

class KotaController extends Controller
{
    public function index()
    { 
        $kotas = Kota::all();
        
        return view('dashboard.datadestinasi.kota',compact('kotas'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kota' => 'required|max:255',
            'kode_kota' => 'required',
            'keterangan' => 'required'
        ]);
        $show = Kota::create($validatedData);
   
        return redirect('/datadestinasi/kota')->with('success', 'Game is successfully saved');
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
