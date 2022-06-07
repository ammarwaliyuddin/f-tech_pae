<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi;

class DisposisiController extends Controller
{
    public function index()
    { 
        return view('dashboard.datamaster.disposisi');
    }

    public function list(Request $request){     
        $searching = $request->input('searching');
        
        $disposisis = empty($searching) ? Disposisi::latest()->paginate(2) : Disposisi::where('nama_disposisi','like','%'.$searching.'%')->paginate(2);
        
        return view('dashboard.datamaster.view.list_disposisi',compact('disposisis'));
    }


    public function store(Request $request)
    {
        $rules=[
            'nama_disposisi' => 'required|max:255',
            'id_user' => 'required'
        ];
        $pesan=[
            'nama_disposisi.required'=>'Nama Disposisi harus diisi',
            'id_user.required'=>'Nama User harus diisi'
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
           
            // $show = Disposisi::create();
           $disposisi=new Disposisi();
           $disposisi->nama_disposisi = $request->input('nama_disposisi');
           $disposisi->keterangan = $request->input('keterangan');
           $disposisi->id_user = $request->input('id_user');
           $disposisi =$disposisi->save();

            $data=array(
                'success'=>$disposisi,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }

    public function update(Request $request)
    {
        $rules=[
            'nama_disposisi' => 'required|max:255',
            'id_user' => 'required'
        ];
        $pesan=[
            'nama_disposisi.required'=>'Nama Disposisi harus diisi',
            'id_user.required'=>'Nama User harus diisi'
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
           
            $disposisiUpdate=Disposisi::where('id_disposisi',$request->input('id_disposisi'))
            ->update(
                [
                    'nama_disposisi' => $request->input('nama_disposisi'),
                    'keterangan' => $request->input('keterangan'),
                    'id_user' => $request->input('id_user')
                ]);


            $data=array(
                'success'=>$disposisiUpdate,
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
        $disposisi = Disposisi::where('id_disposisi',$id);
        $disposisi->delete();

        $pesan = ($disposisi)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $disposisi,
            'pesan'=> $pesan
        );
        return $data;
    }
    public function data_disposisi(){
        $disposisis = disposisi::all();
        return $disposisis;
    }
}
