<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('Admin.loginAdmin');
    }

    
    public function send(Request $request){
        $data=$request->validate([ 
            'university_id'=>'required|max:255',
            'password'=>'required|string|min:5|max:20',
         ]);
        
         $password=$request->password ;
         $university_id=$request->university_id;

      
        if($password =='123456' && $university_id== '2013456786'){
            return redirect(url('/admin'));
        }

        return back();
    }

    
    public function logout(Request $request){
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        Session::flush();
        $request->session()->regenerate();
        Session::flash('success', 'تم تسجيل الخروج بنجاح');
        return redirect('/loginAdmin');
    }
}
