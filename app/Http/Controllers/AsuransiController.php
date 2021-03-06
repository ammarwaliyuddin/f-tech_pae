<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asuransi;

class AsuransiController extends Controller
{
    public function index()
    { 
        return view('dashboard.datamaster.asuransi');
    }

    public function list(Request $request){     
        $searching = $request->input('searching');
        
        $asuransis = empty($searching) ? Asuransi::latest()->paginate(2) : Asuransi::where('nama_asuransi','like','%'.$searching.'%')->paginate(2);
        
        return view('dashboard.datamaster.view.list_asuransi',compact('asuransis'));
    }


    public function store(Request $request)
    {
        $rules=[
            'nama_asuransi' => 'required|max:255',
            'harga' => 'required'
        ];
        $pesan=[
            'nama_asuransi.required'=>'Nama Asuransi harus diisi',
            'harga.required'=>'Harga harus diisi'
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
           
            // $show = Asuransi::create();
           $asuransi=new Asuransi();
           $asuransi->nama_asuransi = $request->input('nama_asuransi');
           $asuransi->harga = $request->input('harga');
           $asuransi->keterangan = $request->input('keterangan');
           $asuransi =$asuransi->save();

            $data=array(
                'success'=>$asuransi,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }
    
    public function update(Request $request)
    {
        $rules=[
            'nama_asuransi' => 'required|max:255',
            'harga' => 'required'
        ];
        $pesan=[
            'nama_asuransi.required'=>'Nama Asuransi harus diisi',
            'harga.required'=>'Harga harus diisi'
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
           
            $asuransiUpdate=Asuransi::where('id_asuransi',$request->input('id_asuransi'))
            ->update(
                [
                    'nama_asuransi' => $request->input('nama_asuransi'),
                    'harga' => $request->input('harga'),
                    'keterangan' => $request->input('keterangan')
                ]);


            $data=array(
                'success'=>$asuransiUpdate,
                'pesan'=>'Data berhasil di Update'
            );
            return $data;

        }
    }

    public function destroy($id)
    {
        $asuransi = Asuransi::where('id_asuransi',$id);
        $asuransi->delete();

        $pesan = ($asuransi)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $asuransi,
            'pesan'=> $pesan
        );
        return $data;
    }
    public function data_asuransi(){
        $asuransis = Asuransi::all();
        return $asuransis;
    }
}
