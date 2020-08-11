<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class HomeController extends Controller
{
    public function index(){
        //return view('pages.home_content');
        $all_published_product=DB::table('tabl_product')
             ->join('tbl_catagory','tabl_product.catagory_id','=','tbl_catagory.catagory_id')
             ->join('tbl_manufacture','tabl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
             ->select('tabl_product.*','tbl_catagory.catagory_name','tbl_manufacture.manufacture_name')
             ->where('tabl_product.publication_status', 1)
             ->limit(9)
             ->get();

        $manage_published_product=view('pages.home_content')
         ->with('all_published_product', $all_published_product);
        return view('layout')
         ->with('pages.home_content',$manage_published_product);
    }
    public function showproduct_by_catagory($catagory_id){
        //dd($catagory_id);
        $product_by_catagory=DB::table('tabl_product')
             ->join('tbl_catagory','tabl_product.catagory_id','=','tbl_catagory.catagory_id')
             ->select('tabl_product.*','tbl_catagory.catagory_name')
             ->where('tbl_catagory.catagory_id', $catagory_id)
             ->where('tabl_product.publication_status', 1)
             ->limit(18)
             ->get();

        $manage_product_by_catagory=view('pages.catagory_by_product')
         ->with('product_by_catagory', $product_by_catagory);
        return view('layout')
         ->with('pages.catagory_by_product',$manage_product_by_catagory);
    }
    public function showproduct_by_manufacture($manufacture_id){
        //dd($catagory_id);
        $product_by_manufacture=DB::table('tabl_product')
             ->join('tbl_manufacture','tabl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
             ->select('tabl_product.*','tbl_manufacture.manufacture_name')
             ->where('tbl_manufacture.manufacture_id', $manufacture_id)
             ->where('tabl_product.publication_status', 1)
             ->limit(18)
             ->get();

        $manage_product_by_manufacture=view('pages.manufacture_by_product')
         ->with('product_by_manufacture', $product_by_manufacture);
        return view('layout')
         ->with('pages.manufacture_by_product',$manage_product_by_manufacture);
    }
    public function product_details($product_id){
        //dd($product_id);
        $product_by_details=DB::table('tabl_product')
        ->join('tbl_catagory','tabl_product.catagory_id','=','tbl_catagory.catagory_id')
        ->join('tbl_manufacture','tabl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
        ->select('tabl_product.*','tbl_catagory.catagory_name', 'tbl_manufacture.manufacture_name')
        ->where('tabl_product.product_id', $product_id)
        ->where('tabl_product.publication_status', 1)
        ->first();

   $manage_product_by_details=view('pages.product_details')
    ->with('product_by_details', $product_by_details);
   return view('layout')
    ->with('pages.product_details',$manage_product_by_details);

    }

}
