<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    { 
        
        return view('dashboard.datamaster.barang');
    }

    public function list(){     
        $barangs = Barang::all();
        
        return view('dashboard.datamaster.view.list_barang',compact('barangs'));
    }


    public function store(Request $request)
    {
        $rules=[
            'jenis_barang' => 'required|max:255',
            'harga' => 'required',
            'keterangan' => 'required'
        ];

        $pesan=[
            'jenis_barang.required'=>'Jenis Barang harus diisi',
            'harga.required'=>'Harga harus diisi',
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
           
            // $show = Barang::create();
            $barang=new Barang();
            $barang->jenis_barang = $request->input('jenis_barang');
            $barang->harga = $request->input('harga');
            $barang->keterangan = $request->input('keterangan');
            $barang = $barang->save();

            $data=array(
                'success'=> $barang,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }
    
    public function update(Request $request)
    {
        $rules=[
            'jenis_barang' => 'required|max:255',
            'harga' => 'required',
            'keterangan' => 'required'
        ];

        $pesan=[
            'jenis_barang.required'=>'Jenis Barang harus diisi',
            'harga.required'=>'Harga harus diisi',
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
           
            $barangUpdate=Barang::where('id_barang',$request->input('id_barang'))
            ->update(
                [
                    'jenis_barang' => $request->input('jenis_barang'),
                    'harga' => $request->input('harga'),
                    'keterangan' => $request->input('keterangan')
                ]);


            $data=array(
                'success'=>$barangUpdate,
                'pesan'=>'Data berhasil di Update'
            );
            return $data;

        }

    public function destroy($id)
    {
        $barang = Barang::where('id_barang',$id);
        $barang->delete();

        $pesan = ($barang)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $barang,
            'pesan'=> $pesan
        );
        return $data;
    }

    public function data_barang(){
        $barangs = Barang::all();
        return $barangs;
    }

}
