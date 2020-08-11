<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class ProductController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
     return view('admin.add_product');  
          }
    public function save_product(Request $request){
        $this->AdminAuthCheck();
        $data=array ();
        $data['product_name'] = $request->product_name;
        $data['catagory_id'] = $request->catagory_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['product_short_describtion'] = $request->product_short_describtion;
        $data['product_long_describtion'] = $request->product_long_describtion;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['publication_status'] = $request->publication_status;
        $image = $request->file('product_image');
       if($image){
            $image_name=str_random(20);

            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path, $image_full_name);
            if($success){
                $data['product_image']=$image_url;
                DB::table('tabl_product')->insert($data);
                Session::put('massage','image upload succesfull');
                return Redirect::to('/add-products');

            }

        }
        $data['product_image']='';
                DB::table('tabl_product')->insert($data);
                Session::put('massage','image upload succesfull without image');
                return Redirect::to('/add-product');    
    }

    public function all_product(){
       // echo"samir";
       $this->AdminAuthCheck();
         //////get catagory name 
    $all_product_info=DB::table('tabl_product')
                    ->join('tbl_catagory','tabl_product.catagory_id','=','tbl_catagory.catagory_id')
                    ->join('tbl_manufacture','tabl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
                    ->select('tabl_product.*','tbl_catagory.catagory_name','tbl_manufacture.manufacture_name')
                    ->get();
    
    $manage_product=view('admin.all_product')
                     ->with('all_product_info', $all_product_info);
    return view('admin_layout')
                 ->with('admin.all_product',$manage_product);

    }
    public function unactive_product($product_id){
         //dd($catagory_id);
       DB::table('tabl_product')->where('product_id',$product_id)
             ->update(['publication_status'=>0]);
        Session::put('massage','product unactive succesfull');
        return Redirect::to('/all-products');
     }

     public function active_product($product_id){
        //dd($catagory_id);
   
         DB::table('tabl_product')->where('product_id',$product_id)
                  ->update(['publication_status'=>1]);
         Session::put('massage','product active succesfull');
          return Redirect::to('/all-products');
     }

     public function delete_product($product_id){
        $this->AdminAuthCheck();
        DB::table('tabl_product')
            ->where('product_id',$product_id)
            ->delete();
       Session::put('massage','product delete succesfull');
       return Redirect::to('/all-products');
    }

    public function edit_product($product_id){
        $this->AdminAuthCheck();
        $product_info=DB::table('tabl_product')
               ->where('product_id',$product_id)->first();
        $product_info=view('admin.edit_product')
               ->with('product_info', $product_info);
        return view('admin_layout')
               ->with('admin.edit_product',$product_info);
       }

    public function update_product(Request $request,$product_id){
     
        $data=array ();
        $data['product_name'] = $request->product_name;
        $data['catagory_id'] = $request->catagory_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['product_short_describtion'] = $request->product_short_describtion;
        $data['product_long_describtion'] = $request->product_long_describtion;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['publication_status'] = $request->publication_status;
        $image = $request->file('product_image');
       if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path, $image_full_name);
            if($success){
                $data['product_image']=$image_url;
                DB::table('tabl_product')
                ->where('product_id',$product_id)
                ->update($data);
                Session::put('massage','image upload succesfull');
                return Redirect::to('/all-products');

            }

        }
        $data['product_image']='';
               $result= DB::table('tabl_product')
                ->where('product_id',$product_id)
                ->update($data);
                Session::put('massage','image upload succesfull without image');
                return Redirect::to('/all-products');   
                 
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
    public function searchProduct(Request $request){
            //echo "santo";
            if($request->isMethod('post')){
                $data=$request->all();
                $search_product=$data['product'];
                $productAll = DB::table('tabl_product')
                      ->where('product_name','like','%'. $search_product)
                      ->where('tabl_product.publication_status', 1)
                       ->get();
             //dd($productAll)     // dd($manage_product_by_search);
            return view('pages.search')
            ->with('productAll', $productAll);
            }
    }
    
   
          
      
}
