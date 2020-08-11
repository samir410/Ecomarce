<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class ManudactureController extends Controller
{
   public function index(){
    //echo"santo";
    return view('admin.add_manufacture');
    }
   public function save_manufacture(Request $request){
    $data=array();
    $data['manufacture_id']=$request->manufacture_id;
    $data['manufacture_name']=$request->manufacture_name;
    $data['manufacture_describtion']=$request->manufacture_describtion;
    $data['publication_status']=$request->publication_status;
    $result=DB::table('tbl_manufacture')->insert($data);

    Session::put('massage','manufacture add succesfull!!!');
    return Redirect::to('/add-manufacture');
    }
    public function all_manufacture(){
        //echo"add catagory";
        //return view('admin.all_catagory');
        $all_manufacture_info=DB::table('tbl_manufacture')->get();
        $manage_manufacture=view('admin.all_manufacture')
        ->with('all_manufacture_info', $all_manufacture_info);

        return view('admin_layout')
        ->with('admin.all_manufacture',$manage_manufacture);
       }
    public function delete_manufacture($manufacture_id){
        DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->delete();
       Session::put('massage','manufacture delete succesfull');
       return Redirect::to('/all-manufacture');

  
      }
      public function unactive_manufacture($manufacture_id){
        //dd($catagory_id);
        DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)
        ->update(['publication_status'=>0]);
        Session::put('massage','manufacture unactive succesfull');
        return Redirect::to('/all-manufacture');
 
         
        }
  public function active_manufacture($manufacture_id){
     //dd($catagory_id);
     DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)
     ->update(['publication_status'=>1]);
     Session::put('massage','manufacture active succesfull');
     return Redirect::to('/all-manufacture');
 
      
     }
    public function edit_manufacture($manufacture_id){
 
       $manufacture_info=DB::table('tbl_manufacture')
       ->where('manufacture_id',$manufacture_id)->first();
       $manufacture_info=view('admin.edit_manufacture')
       ->with('manufacture_info', $manufacture_info);
          return view('admin_layout')
           ->with('admin.edit_manufacture',$manufacture_info);
     
          
         }
    public function update_manufacture(Request $request,$manufacture_id){
             $data=array();
             $data['manufacture_name']=$request->manufacture_name;
             $data['manufacture_describtion']=$request->manufacture_describtion;
             $result=DB::table('tbl_manufacture')
             ->where('manufacture_id',$manufacture_id)
             ->update($data);
             Session::put('massage','manufacture update succesfull');
             return Redirect::to('/all-manufacture');
            }

    
}
