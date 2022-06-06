<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function index()
    { 
        return view('dashboard.datadestinasi.kecamatan');
    }

    public function list(Request $request){   

        $searching = $request->input('searching');
        
        $kecamatans = empty($searching) ? Kecamatan::latest()->paginate(2) : Kecamatan::where('nama_kecamatan','like','%'.$searching.'%')->paginate(2);
        return view('dashboard.datadestinasi.view.list_kecamatan',compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $rules=[
            'nama_kecamatan' => 'required|max:255',
            'id_kota' => 'required'
        ];

        $pesan=[
            'nama_kecamatan.required'=>'Nama Kecamatan harus diisi',
            'id_kota.required'=>'Nama Kota harus diisi'
        ];

        // dd($request->all());

        $validasi=\Validator::make($request->all(),$rules,$pesan);
      

        if($validasi->fails()){
            $data=array(
                'success' =>false,
                'pesan'   =>'Validasi Gagal',
                'error'   =>$validasi->errors()->all()
            );

            return $data;
        }else{
           
            // $show = Kecamatan::create();
           $kecamatan=new Kecamatan();
           $kecamatan->nama_kecamatan = $request->input('nama_kecamatan');
           $kecamatan->id_kota = $request->input('id_kota');
           $kecamatan->keterangan = $request->input('keterangan');
           $kecamatan =$kecamatan->save();

            $data=array(
                'success'=>$kecamatan,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }

    
    public function update(Request $request)
    {
        $rules=[
            'nama_kecamatan' => 'required|max:255',
            'id_kota' => 'required'
        ];

        $pesan=[
            'nama_kecamatan.required'=>'Nama Kecamatan harus diisi',
            'id_kota.required'=>'Nama Kota harus diisi'
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
           
            $kecamatanUpdate=Kecamatan::where('id_kecamatan',$request->input('id_kecamatan'))
            ->update(
                [
                    'nama_kecamatan' => $request->input('nama_kecamatan'),
                    'id_kota' => $request->input('id_kota'),
                    'keterangan' => $request->input('keterangan')
                ]);


            $data=array(
                'success'=>$kecamatanUpdate,
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
        $kecamatan = Kecamatan::where('id_kecamatan',$id);
        $kecamatan->delete();

        $pesan = ($kecamatan)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $kecamatan,
            'pesan'=> $pesan
        );
        return $data;
    }

    public function data_kecamatan(Request $request){
        $id_kota = $request->input('id_kota_destinasi');
        $kecamatans = Kecamatan::where('id_kota',$id_kota)->get();
        return $kecamatans;
    }
}
