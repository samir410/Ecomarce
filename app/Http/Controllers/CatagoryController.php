<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class CatagoryController extends Controller
{
   public function index(){
       //echo"add catagory";
       $this->AdminAuthCheck();
       return view('admin.add_catagory');
   }
   public function all_catagory(){
    //echo"add catagory";
    //return view('admin.all_catagory');
    $this->AdminAuthCheck();
    $all_catagory_info=DB::table('tbl_catagory')->get();
    $manage_catagory=view('admin.all_catagory')
                 ->with('all_catagory_info', $all_catagory_info);
    return view('admin_layout')
                 ->with('admin.all_catagory',$manage_catagory);
   }
    public function save_catagory(Request $request){
       $this->AdminAuthCheck();
            $data=array();
            $data['catagory_id']=$request->catagory_id;
            $data['catagory_name']=$request->catagory_name;
            $data['catagory_describtion']=$request->catagory_describtion;
            $data['publication_status']=$request->publication_status;

            $result=DB::table('tbl_catagory')->insert($data);
            Session::put('massage','catagory add succesfull');
            return Redirect::to('/add-catagory');
     }
    public function unactive_catagory($catagory_id){
       //dd($catagory_id);
       DB::table('tbl_catagory')->where('catagory_id',$catagory_id)
                 ->update(['publication_status'=>0]);
       Session::put('massage','catagory unactive succesfull');
       return Redirect::to('/all-catagory');

        
       }
    public function active_catagory($catagory_id){
      //dd($catagory_id);
       DB::table('tbl_catagory')->where('catagory_id',$catagory_id)
                ->update(['publication_status'=>1]);
       Session::put('massage','catagory active succesfull');
        return Redirect::to('/all-catagory');

     
    }
    public function edit_catagory($catagory_id){
       $this->AdminAuthCheck();
      $catagory_info=DB::table('tbl_catagory')
             ->where('catagory_id',$catagory_id)->first();
      $catagory_info=view('admin.edit_catagory')
             ->with('catagory_info', $catagory_info);
      return view('admin_layout')
             ->with('admin.edit_catagory',$catagory_info);
    
         
    }
    public function update_catagory(Request $request,$catagory_id){
       $this->AdminAuthCheck();
            $data=array();
            $data['catagory_name']=$request->catagory_name;
            $data['catagory_describtion']=$request->catagory_describtion;
            $result=DB::table('tbl_catagory')
                   ->where('catagory_id',$catagory_id)
                   ->update($data);
            Session::put('massage','catagory update succesfull');
            return Redirect::to('/all-catagory');
     }
    public function delete_catagory($catagory_id){
       $this->AdminAuthCheck();
             DB::table('tbl_catagory')
                 ->where('catagory_id',$catagory_id)
                 ->delete();
            Session::put('massage','catagory delete succesfull');
            return Redirect::to('/all-catagory');  
    }
    public function AdminAuthCheck(){
       $admin_id=Session::get('admin_id');
       if($admin_id){
           return;
       } 
       else{
           return Redirect::to('/back')->send();
       }
   }

}
