<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(Request $req){
        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if(Auth::attempt($dataUserLogin)){
            //Dang nhap thanh cong
            if(Auth::user()->role == '1'){
                return redirect()->route('admin.products.listProduct')->with([
                    'message' => 'Dang nhap thanh cong'
                ]);
            }else{
                echo "User"; //redirect user
            }
        }else{
            //Dang nhap that bai
            return redirect()->route('login')->with([
                'message' => 'Email hoac password khong dung'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Dang xuat thanh cong'
        ]);
    }

    public function register(){
        return view('register');
    }

    public function postRegister(Request $req){
        $check = User::where('email', $req->email)->exists();

        if($check){
            return redirect()->route('register')->with([
                'message' => 'Email da ton tai'
            ]);
        }else{
            $dataUserRegister = [
                'name' => $req->name,
                'email' => $req->email,
                // 'phone' => $req->phone,
                // 'address' => $req->address,
                'password' => Hash::make($req->password)
                
            ];

            $newUser = User::create($dataUserRegister);

            return redirect()->route('login')->with([
                'message' => 'Dang ky thanh cong'
            ]);
        }
    }
}
