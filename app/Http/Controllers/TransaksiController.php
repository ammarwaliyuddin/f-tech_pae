<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Kota;

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
            
            //BEGIN :: Generator No Resi
            $sixRandom = rand(100000,999999);
            $destinasi=Destinasi::where('id_destinasi',$request->input('destinasi'))->first();
            
            $kota=Kota::where('id_kota',$destinasi->id_kota_origin)->first();
            $threeRandom = rand(100,999);
            $date = date('my');

            $no_resi = $sixRandom.$kota->kode_kota.$threeRandom.$date;
            
            // END :: Generator No Resi


            $transaksi=new Transaksi();
            $transaksi->no_resi = $no_resi;
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
