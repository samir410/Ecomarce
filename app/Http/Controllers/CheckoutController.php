<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Session;
session_start();

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
   public function login_check(){
       return view('pages.login');
   }

   public function customer_reg(Request $request){
    $data=array ();
    $data['customer_name'] = $request->customer_name;
    $data['customer_email'] = $request->customer_email;
    $data['password'] = md5($request->password);
    $data['mobail_number'] = $request->mobail_number;
   
    $customer_id=DB::table('tbl_customer')
                  ->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect('/checkout');
   
}
public function checkout(){
    return view('pages.checkout');
}
public function save_shiping_details(Request $request){
    $data=array ();
    $data['shiping_mail'] = $request->shiping_mail;
    $data['shiping_first_name'] = $request->shiping_first_name;
    $data['shiping_last_name'] = $request->shiping_last_name;
    $data['shiping_address'] = $request->shiping_address;
    $data['shiping_mobile_number'] = $request->shiping_mobile_number;
    $data['shiping_city'] = $request->shiping_city;
    //dd($data);

    $shiping_id=DB::table('tbl_shiping')
                  ->insertGetId($data);
        Session::put('shiping_id',$shiping_id);
        return Redirect('/payment');
   
}
public function customer_login(Request $request){
    $customer_email=$request->customer_email;
    $password=md5($request->password);
    $result=DB::table('tbl_customer')
             ->where('customer_email',$customer_email)
             ->where('password', $password)
             ->first();
    //dd($result);
    if($result){
        Session::put('customer_id',$result->customer_id);
        return Redirect::to('/checkout');
    }
    else{
        return Redirect::to('/login-check');

    }
}
public function customer_logout(Request $request){
    Session::flush();
    return Redirect::to('/');
}
public function payment(){
    return view('pages.payment');
}
public function order_place(Request $request){
    $payment_gateway=$request->payment_method;
    $pdata=array ();
    $pdata['payment_method'] = $payment_gateway;
    $pdata['payment_status'] = 'pending';
   
    $payment_id=DB::table('tbl_payment')
                  ->insertGetId($pdata);
    
     $odata=array ();
     $odata['customer_id'] = Session::get('customer_id');
     $odata['shiping_id'] = Session::get('shiping_id');
     $odata['payment_id'] = $payment_id;
     $odata['order_total'] = Cart::total();
     $odata['order_status'] = 'pending';

     $order_id=DB::table('tbl_order')
                  ->insertGetId($odata);
    $contents=Cart::content();
    
    $oddata=array();

    foreach($contents as $v_content){
     $oddata['order_id'] = $order_id;
     $oddata['product_id'] = $v_content->id;
     $oddata['product_name'] =  $v_content->name;
     $oddata['product_price'] =  $v_content->price;
     $oddata['product_sales_quantity'] =  $v_content->qty;

     DB::table('tbl_order_details')
                  ->insertGetId($oddata);
    }

    if($payment_gateway=='Handcash'){
        Cart::destroy();
        return view('pages.handcash');
    }elseif($payment_gateway=='Bkash'){
        echo"successfully done by bkash";
    }
    else{
        echo"not selected";
    }

  
}

}
