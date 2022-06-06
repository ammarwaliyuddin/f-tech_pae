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
        
        $users = empty($searching) ? User::latest()->paginate(2) : User::where('nama_user','like','%'.$searching.'%')->paginate(2);
           
        return view('dashboard.datapelanggan.view.list_user',compact('users'));
    }


    public function store(Request $request)
    {
        $rules=[
            'nama_user' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'id_level' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'id_kota' => 'required',
            'id_kecamatan' => 'required'
        ];

        $pesan=[
            'nama_user.required'=>'Nama User harus diisi',
            'email.required'=>'Email User harus diisi',
            'password.required'=>'Password harus diisi',
            'id_level.required'=>'Id Level harus diisi',
            'alamat.required'=>'alamat harus diisi',
            'hp.required'=>'hp harus diisi',
            'id_kota.required'=>'Id kota harus diisi',
            'id_kecamatan.required'=>'Id kecamatan harus diisi'
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
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->id_level = $request->input('id_level');
            $user->alamat = $request->input('alamat');
            $user->hp = $request->input('hp');
            $user->id_kota = $request->input('id_kota');
            $user->id_kecamatan = $request->input('id_kecamatan');
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
            'email' => 'required',
            'password' => 'required',
            'id_level' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'id_kota' => 'required',
            'id_kecamatan' => 'required'
        ];

        $pesan=[
            'nama_user.required'=>'Nama User harus diisi',
            'email.required'=>'Email User harus diisi',
            'password.required'=>'Password harus diisi',
            'id_level.required'=>'Id Level harus diisi',
            'alamat.required'=>'alamat harus diisi',
            'hp.required'=>'hp harus diisi',
            'id_kota.required'=>'Id kota harus diisi',
            'id_kecamatan.required'=>'Id kecamatan harus diisi'
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
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'id_level' => $request->input('id_level'),
                    'alamat' => $request->input('alamat'),
                    'hp' => $request->input('hp'),
                    'id_kota' => $request->input('id_kota'),
                    'id_kecamatan' => $request->input('id_kecamatan')
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
    public function data_user(){
        $users = User::all();
        return $users;
    }
    public function data_alamatUser(Request $request){
        $users = User::where('id_user',$request->input('id_user'))->first();
        return $users;
    }
}
