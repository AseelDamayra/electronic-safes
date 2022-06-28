<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('User.loginUser');
    }

    public function send(Request $request){
        $data=$request->validate([ 
            'university_id'=>'required|max:255',
            'password'=>'required|string|min:5|max:20',
         ]);
        
        
         $islogin=Auth::attempt([
        'university_id'=>$request->university_id,
         'password'=>$request->password,
        ]);
      
        if($islogin){
            return redirect(url('/'));
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
        return redirect('/');
    }
 
}
