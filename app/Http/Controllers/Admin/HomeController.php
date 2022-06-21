<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Cabinet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $data['avilable']=Cabinet::where('status',1)->count();
        $data['Notavilable']=Cabinet::where('status',2)->count();
        
        return view('Admin.admin')->with($data);
    }

    public function avilableC(){
        $data['avilables']=Cabinet::where('status',1)->paginate(5);
    
        return view('Admin.avilable')->with($data);
    }

    public function search(Request $request){
        
        $search = $request->input('search');
        $data['search'] = Cabinet::where('college', 'LIKE', "%{$search}%")
            ->orWhere('floor_no', 'LIKE', "%{$search}%")
            ->get();
            if (count ( $data['search'] ) > 0)
            return view ( 'Admin.search' )->with($data);
        else{
             session()->flash('danger','المواصفات المطلوبة غير متاحة حاليا .. الرجاء المحاولة لاحقا');
              return back();
            }
       
        
    }

    public function send(Request $request){

        $validator=Validator::make($request->all(),[
            'college'=>'required|string|max:255',
            'floor_no'=>'required',
            'cabinet_no'=>'required',
          ]);
  
        Cabinet::create([
            'college'=>$request->college,
            'floor_no'=>$request->floor_no,
            'cabinet_no'=>$request->cabinet_no,
           
         ]);

                      
        $request->session()->flash('success','تمت العملية بنجاح');
        return back();

    }

    public function mahjoza(){

 
      $data['users'] = Cabinet::with('users')->where('status',2)->get();
      $first=Cabinet::first();
      $data['UC']=$first->users()->get();

       return view('Admin.mahjoza')->with($data);
    }

 
    public function DeleteCAdmin($id,Request $request){
        $updateC=Cabinet::where('id',$id)
        ->update(['status'=>1]);

        $cabinet = Cabinet::find($id);
        $cabinet->users()->wherePivot('cabinet_id',$id)->detach();
        
        $request->session()->flash('success','تمت العملية بنجاح');        
         
            return back();
    }

    
    public function searchmahjoza(Request $request){
        
        $search = $request->input('search');
        $c = Cabinet::with('users')->get();
         $first=Cabinet::first();

        $data['searchU']=$first->users()->where('university_id','LIKE',"%{$search}%")->get();
  
        $data['searchU'] = User::where('university_id', 'LIKE', "%{$search}%")->get();


            if (count ( $data['searchU'] ) > 0)
            return view ( 'Admin.searchMahjoz' )->with($data);
        else{
             session()->flash('danger','الطالب المراد غير متوفر حاليا');
              return back();
            }
       
        
    }


}
