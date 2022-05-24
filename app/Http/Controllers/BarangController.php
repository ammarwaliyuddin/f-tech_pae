<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    { 
        $barangs = Barang::all();
        
        return view('dashboard.datamaster.barang',compact('barangs'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_barang' => 'required|max:255',
            'harga' => 'required',
            'keterangan' => 'required'
        ]);
        $show = Barang::create($validatedData);
   
        return redirect('/datamaster/barang')->with('success', 'Game is successfully saved');
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
