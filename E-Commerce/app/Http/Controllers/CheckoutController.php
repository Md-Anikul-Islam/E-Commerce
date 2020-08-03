<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_check()
    {
       
        return view('pages.login');
    }

     public function customer_signup(Request $request)
     {
       
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['password']=md5($request->password);
        $data['customer_phone']=$request->customer_phone;
        
        $customer_id=DB::table('tbl_customer')
                    ->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/checkout');
     }
    public function checkout()
    {
        return view('pages.checkout');
    }


    public function customer_login(Request $request)
    {
     
        $customer_email=$request->customer_email;
        $password=md5($request->password);

       
        $result=DB::table('tbl_customer')
                ->where('customer_email',$customer_email)
                ->where('password',$password)
                ->first();
       
              if($result)
              {
                Session::put('customer_name',$result->customer_name);
                Session::put('customer_id',$result->customer_id);
                return Redirect::to('/checkout');

              }
              else
              {
                  Session::put('messege','Email or Password Invalid Try Again');
                  return Redirect::to('/login-check');
              }


    }


    public function logout()
    {
    
      Session::flush();
      return Redirect::to('/');
    }

    // public function AdminAuthCheck()
    // {
    //   $admin_id=Session::get('customer_id');
    //   if($admin_id)
    //   {
    //     return;
    //   }
    //   else
    //   {
    //     return Redirect::to('/admin')->send();
    //   }
    // }


    
    public function save_shipping_details(Request $request)
    {
      $data=array();
      $data['shipping_email']=$request->shipping_email;
      $data['shipping_first_name']=$request->shipping_first_name;
      $data['shipping_last_name']=$request->shipping_last_name;
      $data['shipping_address']=$request->shipping_address;
      $data['shipping_phone_number']=$request->shipping_phone_number;
      $data['shipping_city']=$request->shipping_city;

      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";

      $shipping_id=DB::table('tbl_shipping')
                  ->insertGetId($data);

                  Session::put('shipping_id',$shipping_id);
                
                  return Redirect::to('/payment');
    
      
    }


    public function payment()
    {
      return view('pages.payment');

    }


    public function order_place(Request $request)
    {
        $payment_method=$request->payment_method;

        $pdata=array();
        $pdata['payment_method']=$payment_method;
        $pdata['payment_status']=$request->payment_status;

        $payment_id= DB::table('tbl_payment')
                     ->insertGetId($pdata);


        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::getTotal(); 
        $odata['order_status']=$request->order_status;

        $order_id=DB::table('tbl_order')
                        ->insertGetId($odata);

        $contents=Cart::getContent();
        $oddata=array();

        foreach($contents as $v_contant)
        {
          $oddata['order_id']=$order_id;
          $oddata['products_id']=$v_contant->id;
          $oddata['products_name']=$v_contant->name;
          $oddata['products_price']=$v_contant->price;
          // $oddata['products_sales_quantity']=$v_contant->products_sales_quantity;


         DB::table('tbl_order_details')
                     ->insert($oddata);
         

        }


        if($payment_method=='handcash')
        {
          return view('pages.all_succes');
        }
        else if($payment_method=='creditcard')
        {
          return view('pages.all_succes');
          Cart::clear();
        }
        else if($payment_method=='debitcard')
        {
          return view('pages.all_succes');
          Cart::clear();
        }
        else if($payment_method=='paypal')
        {
          return view('pages.all_succes');
          Cart::clear();
        }
        else if($payment_method=='dbbl')
        {
          return view('pages.all_succes');
          Cart::clear();
        }
        else if($payment_method=='bkash')
        {
          return view('pages.all_succes');
          Cart::clear();
        }
        else
        {
          echo "not selected";
        }



        // $shipping_id=Session::get('shipping_id');
        // $customer_id=Session::get('customer_id');
         //echo  $payment_method;

        // echo "<pre>";
        // print_r($shipping_id);
        // print_r($customer_id);
        // echo "</pre>";

        //return view('pages.checkout');
    }

}
