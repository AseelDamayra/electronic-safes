<?php

namespace App\Http\Controllers;

use Session;
use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index(){

        $data['cabinets']=Cabinet::where('status',1)->paginate(6);
        $data['profile']=User::where('id',Auth::id())->first();
     
         $data['finalBooking']= Carbon::now()->addMonths(4)->format('Y-m-d');;


         $user=Auth::user();
         $data['usersD'] = $user->cabinets()->get();
      
         return view('User.index')->with($data);

    }

    public function search(Request $request){

        $search = $request->input('search');
        $data['search'] = Cabinet::where('college', 'LIKE', "%{$search}%")
            ->orWhere('floor_no', 'LIKE', "%{$search}%")
            ->get();
            if (count ( $data['search'] ) > 0)
                return view ( 'User.search' )->with($data);
            else{
                 session()->flash('danger','المواصفات المطلوبة غير متاحة حاليا .. الرجاء المحاولة لاحقا');
                  return back();
                }
           

    }

    public function profile(Request $request){
        
        $validator = \Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'university_id'=>'required',
            'college'=>'required',
            'majoring'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
            'phone'=>'required',
            'address'=>'required|string|max:255',
            'password'=>'required',
        ]);

             $query = User::find(Auth::user()->id)->update([
                  'student_name'=>$request->name,
                  'university_id '=>$request->university_id ,
                  'college'=>$request->college,
                  'majoring'=>$request->majoring,
                  'phone'=>$request->phone,
                  'address'=>$request->address,
                  'email'=>$request->email,
                  'password'=>Hash::make($request->password),
             ]);

        return back();
        }

        public function DeleteC($id){

            $updateC=Cabinet::where('id',$id)
            ->update(['status'=>1]);
            
            $user=Auth::user()->id;
            $cabinet = Cabinet::find($id);
            $cabinet->users()->wherePivot('user_id',$user)->detach();
            Session::flash('success', 'تمت عملية الحذف بنجاح');

            return back();
        }

        public function renewal($id,Request $request){
           $user=Auth::user();
    
        $date = Carbon::createFromFormat('Y-m-d', $request->finalBooking);
        $daysToAdd = 120;
        $date = $date->addDays($daysToAdd);

        $user->cabinets()->updateExistingPivot($id,[
            'booking_finally_date'=>$date,
        ]);
        Session::flash('success', 'تمت عملية تجديد الحجز بنجاح');

            return back();

        
        }

        public function booking(Request $request){
     
      $cabinets = Cabinet::with('users')->get(); 
      $user=Auth::user();
      $userid=Auth::user()->id;
      $finalBooking= Carbon::now()->addMonths(4)->format('Y-m-d');
  
      
      $data=[
        'user_id'=>$userid,
        'cabinet_id'=>$cabinets[0]->id,
         'booking_finally_date'=>$finalBooking,
     ];  

     if($user->cabinets()->count() == 1){
        $dat=$user->cabinets()->limit(1)->get();
        session()->flash('danger','يوجد خزانة محجوزة باسم هذا المستخدم');

    }
 else{

     $updateC=Cabinet::where('id',$cabinets[0]->id)
     ->update(['user_id'=>$userid,'status'=>2]);
    
      $user->cabinets()->attach($cabinets[0]->id,$data); 

      Session::flash('success', 'تمت عملية الحجز بنجاح');
 }
       return back();
        }

 
}

