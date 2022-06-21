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
}
