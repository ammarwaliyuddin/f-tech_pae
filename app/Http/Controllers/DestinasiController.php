<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class DestinasiController extends Controller
{
    public function index()
    { 
        
        return view('dashboard.datadestinasi.destinasi');
    }

    public function list(Request $request){     
        $searching = $request->input('searching');
        
        $destinasis = empty($searching) ? Destinasi::all() : Destinasi::where('Kota_origin','like','%'.$searching.'%')->get();
        
        return view('dashboard.datadestinasi.view.list_destinasi',compact('destinasis'));
    }


    public function store(Request $request)
    {

        $rules=[
            'kota_origin' => 'required|max:255',
            'kota_destinasi' => 'required',
            'nama_kecamatan' => 'required',
            'kode_destinasi' => 'required',
            'harga' => 'required'
        ];

        $pesan=[
            'kota_origin.required'=>'Kota Origin harus diisi',
            'kota_destinasi.required'=>'Kota Destinasi harus diisi',
            'nama_kecamatan.required'=>'Nama Kecamatan harus diisi',
            'kode_destinasi.required'=>'Kode Destinasi harus diisi',
            'harga.required'=>'harga harus diisi'
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
           
            // $show = Destinasi::create();
           $destinasi=new Destinasi();
           $destinasi->kota_origin = $request->input('kota_origin');
           $destinasi->kota_destinasi = $request->input('kota_destinasi');
           $destinasi->nama_kecamatan = $request->input('nama_kecamatan');
           $destinasi->kode_destinasi = $request->input('kode_destinasi');
           $destinasi->harga = $request->input('harga');
           
           $destinasi =$destinasi->save();

            $data=array(
                'success'=>$destinasi,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }

    public function update(Request $request)
    {
        $rules=[
            'kota_origin' => 'required|max:255',
            'kota_destinasi' => 'required',
            'nama_kecamatan' => 'required',
            'kode_destinasi' => 'required',
            'harga' => 'required'
        ];

        $pesan=[
            'kota_origin.required'=>'Kota Origin harus diisi',
            'kota_destinasi.required'=>'Kota Destinasi harus diisi',
            'nama_kecamatan.required'=>'Nama Kecamatan harus diisi',
            'kode_destinasi.required'=>'Kode Destinasi harus diisi',
            'harga.required'=>'harga harus diisi'
        ];

        $validasi=\Validator::make($request->all(),$rules,$pesan);
    }

    public function destroy($id)
    {
        $destinasi = Destinasi::where('id_destinasi',$id);
        $destinasi->delete();

        $pesan = ($destinasi)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $destinasi,
            'pesan'=> $pesan
        );
        return $data;
    }

    public function data_destinasi(){
        $destinasis = destinasi::all();
        return $destinasis;
    }
}
