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
        
        $destinasis = empty($searching) ? Destinasi::latest()->paginate(2) : Destinasi::where('kota_origin','like','%'.$searching.'%')->paginate(2);
        
        return view('dashboard.datadestinasi.view.list_destinasi',compact('destinasis'));
    }


    public function store(Request $request)
    {

        $rules=[
            'id_kota_origin' => 'required|max:255',
            'id_kota_destinasi' => 'required',
            'id_kecamatan' => 'required',
            'kode_destinasi' => 'required',
            'id_service'=>'required',
            'harga' => 'required'
        ];

        $pesan=[
            'id_kota_origin.required'=>'Kota Origin harus diisi',
            'id_kota_destinasi.required'=>'Kota Destinasi harus diisi',
            'id_kecamatan.required'=> 'Kecamatan harus diisi',
            'kode_destinasi.required'=>'Kode Destinasi harus diisi',
            'id_service.required'=>'Jenis Service harus diisi',
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
           $destinasi->id_kota_origin = $request->input('id_kota_origin');
           $destinasi->id_kota_destinasi = $request->input('id_kota_destinasi');
           $destinasi->id_kecamatan = $request->input('id_kecamatan');
           $destinasi->kode_destinasi = $request->input('kode_destinasi');
           $destinasi->id_service = $request->input('id_service');
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
            'id_kota_origin' => 'required|max:255',
            'id_kota_destinasi' => 'required',
            'id_kecamatan' => 'required',
            'id_service' => 'required',
            'kode_destinasi' => 'required',
            'harga' => 'required'
        ];

        $pesan=[
            'id_kota_origin.required'=>'Kota Origin harus diisi',
            'id_kota_destinasi.required'=>'Kota Destinasi harus diisi',
            'id_kecamatan.required'=>'Nama Kecamatan harus diisi',
            'id_service.required'=>'Nama Service harus diisi',
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

    public function data_destinasi(Request $request){

        $data = array();
        $data =Destinasi::select("id_destinasi","kode_destinasi","harga");
        if($request->has('q')){
            $search = $request->q;
            $data =$data->where('kode_destinasi','LIKE',"%$search%");
        }
        if($request->has('id_service')){
            $data =$data->where('id_service',$request->id_service);
        }
        $data =$data->get();
        return response()->json($data);

        // $destinasis = destinasi::all();
        // return $destinasis;
    }

    
}
