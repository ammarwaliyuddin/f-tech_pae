<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packing;

class PackingController extends Controller
{
    public function index()
    { 
        return view('dashboard.datamaster.packing');
    }

    public function list(){     
        $packings = Packing::all();
        
        return view('dashboard.datamaster.view.list_packing',compact('packings'));
    }

    public function store(Request $request)
    {
        $rules=[
            'nama_packing' => 'required|max:255',
            'biaya' => 'required',
            'keterangan' => 'required'
        ];

        $pesan=[
            'nama_packing.required'=>'Nama Packing harus diisi',
            'biaya.required'=>'Biaya harus diisi',
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
           
            // $show = Packing::create();
           $packing=new Packing();
           $packing->nama_packing = $request->input('nama_packing');
           $packing->biaya = $request->input('biaya');
           $packing->keterangan = $request->input('keterangan');
           $packing =$packing->save();

            $data=array(
                'success'=>$packing,
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
        $packing = Packing::where('id_packing',$id);
        $packing->delete();

        $pesan = ($packing)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $packing,
            'pesan'=> $pesan
        );
        return $data;
    }
}
