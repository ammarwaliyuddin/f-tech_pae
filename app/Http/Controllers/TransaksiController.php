<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    { 
        $transaksis = Transaksi::all();
        
        return view('dashboard.transaksi',compact('transaksis'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kota' => 'required|max:255',
            'kode_kota' => 'required',
            'keterangan' => 'required'
        ]);
        $show = Transaksi::create($validatedData);
   
        return redirect('/transaksi')->with('success', 'Game is successfully saved');
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
