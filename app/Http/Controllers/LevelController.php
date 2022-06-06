<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    public function index()
    { 
        
        return view('dashboard.datapelanggan.level');
    }

    public function list(Request $request){     
        $searching = $request->input('searching');
        
        $levels = empty($searching) ? Level::latest()->paginate(2) : Level::where('nama_level','like','%'.$searching.'%')->paginate(2);
        
        return view('dashboard.datapelanggan.view.list_level',compact('levels'));
    }


    public function store(Request $request)
    {
        $rules=[
            'nama_level' => 'required|max:255',
            'keterangan' => 'required'
        ];

        $pesan=[
            'nama_level.required'=>'Nama Level harus diisi',
            'keterangan.required'=>'Keterangan harus diisi'
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
           
            // $show = Level::create();
            $level=new Level();
            $level->nama_level = $request->input('nama_level');
            $level->keterangan = $request->input('keterangan');
            $level = $level->save();

            $data=array(
                'success'=> $level,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }

    
    public function update(Request $request)
    {
        $rules=[
            'nama_level' => 'required|max:255',
            'keterangan' => 'required'
        ];

        $pesan=[
            'nama_level.required'=>'Nama Level harus diisi',
            'keterangan.required'=>'keterangan harus diisi'
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
           
            $levelUpdate=Level::where('id_level',$request->input('id_level'))
            ->update(
                [
                    'nama_level' => $request->input('nama_level'),
                    'keterangan' => $request->input('keterangan')
                ]);


            $data=array(
                'success'=>$levelUpdate,
                'pesan'=>'Data berhasil di Update'
            );
            return $data;

        }
    }

    public function destroy($id)
    {
        $level = Level::where('id_level',$id);
        $level->delete();

        $pesan = ($level)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $level,
            'pesan'=> $pesan
        );
        return $data;

    }
    public function data_level(){
        $levels = Level::all();
        return $levels;
    }
}
