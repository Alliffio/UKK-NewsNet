<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengunjung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class OtentikasiController extends Controller
{
    public function index(){
        return view('lapor.login');
    }

    public function registrasi(Request $request){
        return view('lapor.registrasi');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
        ]);
        $data =  new Pengunjung();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->save();
            return redirect('/');
        }

    public function login(Request $request){
        // dd($request->all());
        $data = Pengunjung::where('email',$request->email)->firstOrFail();
        if ($data){
            if(Hash::check($request->password,$data->password)){
                session(['berhasil_login' => true]);
                return redirect('/lapor');
            }
        }
        return redirect('/')->with('message','Email dan Password salah');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/dashboard');
    }

}
