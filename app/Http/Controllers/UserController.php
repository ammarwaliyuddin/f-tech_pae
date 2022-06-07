<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    { 
        
        return view('dashboard.datapelanggan.user');
    }

    public function list(Request $request){     
        $searching = $request->input('searching');
        
        $users = empty($searching) ? User::all() : User::where('nama_user','like','%'.$searching.'%')->get();
           
        return view('dashboard.datapelanggan.view.list_user',compact('users'));
    }


    public function store(Request $request)
    {
        $rules=[
            'nama_user' => 'required|max:255',
            'password' => 'required',
            'level' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'id_kota' => 'required',
            'kecamatan' => 'required'
        ];

        $pesan=[
            'nama_user.required'=>'Nama User harus diisi',
            'password.required'=>'Password harus diisi',
            'level.required'=>'Level harus diisi',
            'alamat.required'=>'alamat harus diisi',
            'hp.required'=>'hp harus diisi',
            'id_kota.required'=>'id_kota harus diisi',
            'kecamatan.required'=>'kecamatan harus diisi'
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
           
            // $show = User::create();
            $user=new User();
            $user->nama_user = $request->input('nama_user');
            $user->password = $request->input('password');
            $user->level = $request->input('level');
            $user->alamat = $request->input('alamat');
            $user->hp = $request->input('hp');
            $user->id_kota = $request->input('id_kota');
            $user->kecamatan = $request->input('kecamatan');
            $user = $user->save();

            $data=array(
                'success'=> $user,
                'pesan'=>'Data berhasil dikirim'
            );
            return $data;

        }
        
    }

    
    public function update(Request $request)
    {
        $rules=[
            'nama_user' => 'required|max:255',
            'password' => 'required',
            'level' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required'
        ];

        $pesan=[
            'nama_user.required'=>'Nama User harus diisi',
            'password.required'=>'Password harus diisi',
            'level.required'=>'Level harus diisi',
            'alamat.required'=>'alamat harus diisi',
            'hp.required'=>'hp harus diisi',
            'kota.required'=>'kota harus diisi',
            'kecamatan.required'=>'kecamatan harus diisi'
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
           
            $userUpdate=User::where('id_user',$request->input('id_user'))
            ->update(
                [
                    'nama_user' => $request->input('nama_user'),
                    'password' => $request->input('password'),
                    'level' => $request->input('level'),
                    'alamat' => $request->input('alamat'),
                    'hp' => $request->input('hp'),
                    'kota' => $request->input('kota'),
                    'kecamatan' => $request->input('kecamatan')
                ]);


            $data=array(
                'success'=>$userUpdate,
                'pesan'=>'Data berhasil di Update'
            );
            return $data;

        }
    }

    public function destroy($id)
    {
        $user = User::where('id_user',$id);
        $user->delete();

        $pesan = ($user)?'Data berhasil Dihapus':'Ada Kesalahan';

        $data=array(
            'success'=> $user,
            'pesan'=> $pesan
        );
        return $data;

    }
    public function data_user(Request $request){
        $data = array();
        $data =User::select("id_user","nama_user");
        if($request->has('q')){
            $search = $request->q;
            $data =$data->where('nama_user','LIKE',"%$search%");
        }
        $data =$data->get();
        return response()->json($data);

        // $users = User::all();
        // return $users;
    }
    public function data_alamatUser(Request $request){
        $users = User::where('id_user',$request->input('id_user'))->first();
        return $users;
    }
}
