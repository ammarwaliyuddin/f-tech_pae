<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class KeuanganController extends Controller
{
    public function index(){
        $keuangans = Transaksi::all();
        
        return view('dashboard.keuangan',compact('keuangans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_resi' => 'required|max:255',
            'pengirim' => 'required',
            'total' => 'required'
        ]);
        $show = Transaksi::create($validatedData);

        $keuangans = empty($searching) ? Keuangan::latest()->paginate(2) : Keuangan::where('nama_kota','like','%'.$searching.'%')->paginate(2);
        
        return view('dashboard.datadestinasi.view.list_kota',compact('kotas'));
    
        return redirect('/keuangan')->with('success', 'Game is successfully saved');
    }

}
    
    

