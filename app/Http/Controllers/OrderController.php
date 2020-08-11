<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Session;
use DB;
session_start();

class OrderController extends Controller
{
    public function manage_order(){
        $all_order_info=DB::table('tbl_order')
                    ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                    ->select('tbl_order.*','tbl_customer.customer_name')
                    ->get();
    
    $manage_order=view('admin.manage_order')
                     ->with('all_order_info', $all_order_info);
    return view('admin_layout')
                 ->with('admin.manage_order',$manage_order);
    }
    public function view_order(){
        $order_by_id =DB::table('tbl_order')
                    ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                    ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                    ->join('tbl_shiping','tbl_order.shiping_id','=','tbl_shiping.shiping_id')
                    ->select('tbl_order.*','tbl_order_details.*','tbl_customer.*','tbl_shiping.*')
                   // ->where('tbl_order.order_id',$order_id)
                    ->get();
    
       $view_order=view('admin.view_order')->with('order_by_id',$order_by_id);
       return view('admin_layout')->with('admin.view_order',$view_order);
       dd($order_by_id);
    }

}
