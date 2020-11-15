<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLogin;
use Illuminate\Support\Facades\Auth;


class LogController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function req(AdminLogin $request){
        try {
            $valid = auth()
            ->guard('admin')
            ->attempt([
                'name' => $request -> input('name') ,
                'password' => $request ->input('password')
            ])  ;
            if ($valid){
                return redirect() -> route('admin.index');
            }else{
                return redirect() -> route('admin.login') -> with(['invalid' => 'بيانات خاطئة']);
            }
        }catch (\Exception $ex){
            return redirect()->route('admin.login')->with(['invalid' => 'حدث خطا ما']);
        }

    }
    public function logout(){
        Auth::logout();
        return  redirect() -> route('admin.login');
    }
}
