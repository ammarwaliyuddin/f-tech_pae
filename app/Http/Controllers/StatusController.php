<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    { 
        return view('dashboard.datamaster.status');
    }

    public function list(Request $request){     
        $searching = $request->input('searching');
        
        $statuss = empty($searching) ? Status::all() : Status::where('kode_status','like','%'.$searching.'%')->get();
        
        return view('dashboard.datamaster.view.list_status',compact('statuss'));
    }


    public function store(Request $request)
    {
        $rules=[
            'kode_status' => 'required|max:255',
            'nama_status' => 'required',
            'keterangan' => 'required'
        ];

        $pesan=[
            'kode_status.required'=>'Kode Status harus diisi',
            'nama_status.required'=>'Nama Status Pengiriman harus diisi',
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
           
            // $show = Status::create();
           $status=new Status();
           $status->kode_status = $request->input('kode_status');
           $status->nama_status = $request->input('nama_status');
           $status->keterangan = $request->input('keterangan');
           $status =$status->save();

            $data=array(
                'success'=>$status,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }

    public function update(Request $request)
    {
        {
            $rules=[
                'kode_status' => 'required|max:255',
                'nama_status' => 'required',
                'keterangan' => 'required'
            ];
            $pesan=[
                'kode_status.required'=>'Kode Status harus diisi',
                'nama_status.required'=>'Nama Status harus diisi',
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
               
                $statusUpdate=Status::where('id_status',$request->input('id_status'))
                ->update(
                    [
                        'kode_status' => $request->input('kode_status'),
                        'nama_status' => $request->input('nama_status'),
                        'keterangan' => $request->input('keterangan')
                    ]);
    
    
                $data=array(
                    'success'=>$statusUpdate,
                    'pesan'=>'Data berhasil di Update'
                );
                return $data;
    
            }
        }
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
        $status = Status::where('id_status',$id);
        $status->delete();

        $pesan = ($status)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $status,
            'pesan'=> $pesan
        );
        return $data;
    }

    public function data_status(){
        $status = Status::all();
        return $status;
    }
}
