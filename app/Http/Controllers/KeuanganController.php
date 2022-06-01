<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;

class KeuanganController extends Controller
{
    public function index(){
        $keuangans = Keuangan::all();
        
        return view('dashboard.keuangan',compact('keuangans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_resi' => 'required|max:255',
            'pengirim' => 'required',
            'total' => 'required'
        ]);
        $show = Keuangan::create($validatedData);
    
        return redirect('/keuangan')->with('success', 'Game is successfully saved');
    }

}
    
    

