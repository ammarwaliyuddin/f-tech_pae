<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    { 
        $services = Service::all();
        
        return view('dashboard.datamaster.service',compact('services'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_service' => 'required|max:255',
            'biaya' => 'required',
            'keterangan' => 'required'
        ]);
        $show = Service::create($validatedData);
   
        return redirect('/datamaster/service')->with('success', 'Game is successfully saved');
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
