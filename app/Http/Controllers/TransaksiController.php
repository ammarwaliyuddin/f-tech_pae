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
        $rules=[
            'pengirim' => 'required|max:255'
        ];

        $pesan=[
            'pengirim.required'=>'Jenis Barang harus diisi'
        ];

        $validasi=\Validator::make($request->all(),$rules,$pesan);
      

        if($validasi->fails()){
            $data=array(
                'success' =>false,
                'pesan'   =>'Validasi Gagal',
                'error'   =>$validasi->errors()->all()
            );

            return $data;
        }else{
           
            // $show = Barang::create();
            $transaksi=new Transaksi();
            $transaksi->id_pengirim = $request->input('pengirim');
            $transaksi->id_penerima = $request->input('pengirim');
            $transaksi->id_destinasi = $request->input('pengirim');
            $transaksi->id_packing = $request->input('pengirim');
            $transaksi->id_service = $request->input('pengirim');
            $transaksi->id_asuransi = $request->input('pengirim');
            // $transaksi->tanggal = $request->input('pengirim');
            $transaksi = $transaksi->save();

            $data=array(
                'success'=> $transaksi,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
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
