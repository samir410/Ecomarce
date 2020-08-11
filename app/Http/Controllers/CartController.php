<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
session_start();

class CartController extends Controller
{
    public function add_cart(Request $request){
        $qty = $request->qty;
        $product_id=$request->product_id;
        $product_info=DB::table('tabl_product')
            ->where('product_id',$product_id)
            ->first();

            $data['qty'] = $qty;
            $data['id']  = $product_info->product_id;
            $data['name']  = $product_info->product_name;
            $data['price']  = $product_info->product_price;
            $data['options']['image']  = $product_info->product_image;
    
            Cart::add($data);
            return Redirect::to('/show-cart');
    }
    public function show_cart(){
        $all_published_catagory=DB::table('tbl_catagory')
        ->where('publication_status', 1)
        ->get();

        $manage_published_catagory=view('pages.add_to_cart')
         ->with('all_published_catagory', $all_published_catagory);
        return view('layout')
         ->with('pages.add_to_cart',$manage_published_catagory);
    }
    public function delete_cart($rowId){
        //dd($rowId);
        Cart::update($rowId,0);
            return Redirect::to('/show-cart');

    }
    public function update_cart(Request $request){
        $qty = $request->qty;
        $rowId=$request->rowId;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
       // dd($rowId);
    }
}
