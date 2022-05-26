<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi;

class DisposisiController extends Controller
{
    public function index()
    { 
        $disposisis = Disposisi::all();
        
        return view('dashboard.datamaster.disposisi',compact('disposisis'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'disposisi' => 'required|max:255',
            'keterangan' => 'required'
        ]);
        $show = Disposisi::create($validatedData);
   
        return redirect('/datamaster/disposisi')->with('success', 'Game is successfully saved');
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
