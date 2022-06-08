<?php

namespace App\Http\Controllers;

use App\Exports\KotaExport;
use App\Imports\KotaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kota;

class KotaController extends Controller
{
    public function index()
    { 
        return view('dashboard.datadestinasi.kota');
    }

    public function list(Request $request){   
        
        $searching = $request->input('searching');
        
        $kotas = empty($searching) ? Kota::latest()->paginate(2) : Kota::where('nama_kota','like','%'.$searching.'%')->paginate(2);
        
        return view('dashboard.datadestinasi.view.list_kota',compact('kotas'));
    }

    public function kotaexport()
    {
        return Excel::download(new KotaExport,'kota.xlsx');
    }

    public function kotaimportexcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataKota' , $namaFile);

        Excel::import(new KotaImport, public_path('/DataKota/'.$namaFile));
        return redirect('/datadestinasi/kota');
    }

    public function store(Request $request)
    {
        $rules=[
            'nama_kota' => 'required|max:255',
            'kode_kota' => 'required'
        ];
        $pesan=[
            'nama_kota.required'=>'Nama Kota harus diisi',
            'kode_kota.required'=>'Kode Kota harus diisi'
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
           
            // $show = Kota::create();
           $kota=new Kota();
           $kota->nama_kota = $request->input('nama_kota');
           $kota->kode_kota = $request->input('kode_kota');
           $kota->keterangan = $request->input('keterangan');
           $kota =$kota->save();

            $data=array(
                'success'=>$kota,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $rules=[
            'nama_kota' => 'required|max:255',
            'kode_kota' => 'required'
        ];

        $pesan=[
            'nama_kota.required'=>'Nama Kota harus diisi',
            'kode_kota.required'=>'Kode Kota harus diisi'
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
           
            $kotaUpdate=Kota::where('id_kota',$request->input('id_kota'))
            ->update(
                [
                    'nama_kota' => $request->input('nama_kota'),
                    'kode_kota' => $request->input('kode_kota'),
                    'keterangan' => $request->input('keterangan')
                ]);


            $data=array(
                'success'=>$kotaUpdate,
                'pesan'=>'Data berhasil di Update'
            );
            return $data;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::where('id_kota',$id);
        $kota->delete();

        $pesan = ($kota)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $kota,
            'pesan'=> $pesan
        );
        return $data;
    }

    public function data_kota(){
        $kota = Kota::all();
        return $kota;
    }
}
