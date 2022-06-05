<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    { 
        return view('dashboard.datamaster.service');
    }

    public function list(){     
        $services = Service::all();
        
        return view('dashboard.datamaster.view.list_service',compact('services'));
    }

    public function store(Request $request)
    {
        $rules=[
            'nama_service' => 'required|max:255',
            'biaya' => 'required'
        ];
        $pesan=[
            'nama_service.required'=>'Nama Service harus diisi',
            'biaya.required'=>'Biaya harus diisi'
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
           
            // $show = Service::create();
           $service=new Service();
           $service->nama_service = $request->input('nama_service');
           $service->biaya = $request->input('biaya');
           $service->keterangan = $request->input('keterangan');
           $service =$service->save();

            $data=array(
                'success'=>$service,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }


    public function update(Request $request)
    {
        $rules=[
            'nama_service' => 'required|max:255',
            'biaya' => 'required'
        ];
        $pesan=[
            'nama_service.required'=>'Nama Service harus diisi',
            'biaya.required'=>'Biaya harus diisi'
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
           
            $serviceUpdate=Service::where('id_service',$request->input('id_service'))
            ->update(
                [
                    'nama_service' => $request->input('nama_service'),
                    'biaya' => $request->input('biaya'),
                    'keterangan' => $request->input('keterangan')
                ]);


            $data=array(
                'success'=>$serviceUpdate,
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
        $service = Service::where('id_service',$id);
        $service->delete();

        $pesan = ($service)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $service,
            'pesan'=> $pesan
        );
        return $data;
    }
    public function data_service(){
        $services = Service::all();
        return $services;
    }
}
