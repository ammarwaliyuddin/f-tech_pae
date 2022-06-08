<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Kota;
use App\Models\Tracking;

class TransaksiController extends Controller
{
    public function index()
    { 
        $transaksis = Transaksi::all();
        return view('dashboard.transaksi.add_transaksi',compact('transaksis'));
    }

    public function lists()
    { 
        $transaksis = Transaksi::all();
        return view('dashboard.transaksi.lists_transaksi',compact('transaksis'));
    }


    public function add_transaksi(Request $request)
    {
        $rules=[
            'pengirim' => 'required',
            'penerima' => 'required',
            'destinasi' => 'required',
            'barang' => 'required',
            'packing' => 'required',
            'service' => 'required',
            'alamat_pengirim' => 'required',
            'alamat_penerima' => 'required',
            'jumlah' => 'required',
            'berat' => 'required',
            'deskripsi' => 'required',
            'instruksi' => 'required',
            'biaya_barang' => 'required',
            'biaya_pengirim' => 'required',
            'total' => 'required'

        ];

        $pesan=[
            'pengirim.required'=>'Nama Pengirim harus diisi',
            'penerima.required'=>'Nama Penerima harus diisi',
            'destinasi.required'=>'Destinasi harus diisi',
            'barangg.required'=>'Jenis Barang harus diisi',
            'packing.required'=>'Packing harus diisi',
            'service.required'=>'Service harus diisi',
            'alamat_pengirim.required'=>'Alamat Pengirim harus diisi',
            'alamat_penerima.required'=>'Alamat Penerima harus diisi',
            'jumlah.required'=>'Jumlah harus diisi',
            'berat.required'=>'Berat harus diisi',
            'deskripsi.required'=>'deskripsi harus diisi',
            'instruksi.required'=>'instruksi harus diisi',
            'biaya_barang.required'=>'Biaya Barang harus diisi',
            'biaya_pengirim.required'=>'Biaya Pengiriman harus diisi',
            'total.required'=>'Total harus diisi',
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
            $transaksi->id_penerima = $request->input('penerima');
            $transaksi->id_destinasi = $request->input('destinasi');
            $transaksi->id_barang = $request->input('barang');
            $transaksi->id_packing = $request->input('packing');
            $transaksi->id_service = $request->input('service');
            $transaksi->id_asuransi = $request->input('asuransi');
            $transaksi->alamat_pengirim = $request->input('alamat_pengirim');
            $transaksi->alamat_penerima = $request->input('alamat_penerima');
            $transaksi->jumlah = $request->input('jumlah');
            $transaksi->berat = $request->input('berat');
            $transaksi->deskripsi = $request->input('deskripsi');
            $transaksi->instruksi = $request->input('instruksi');
            $transaksi->harga_packing = $request->input('harga_packing');
            $transaksi->diskon = $request->input('diskon');
            $transaksi->biaya_barang = $request->input('biaya_barang');
            $transaksi->biaya_pengiriman = $request->input('biaya_pengirim');
            $transaksi->total = $request->input('total');
            $transaksi = $transaksi->save();

            if($transaksi){
                $tracking =new Tracking();
                $tracking->no_resi = $no_resi;
                $tracking->id_status_pengiriman = 1;
                $tracking->id_disposisi = 1;
                $tracking->insert_user = 1;
                $tracking = $tracking->save();
            }

            $data=array(
                'success'=> $tracking,
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
