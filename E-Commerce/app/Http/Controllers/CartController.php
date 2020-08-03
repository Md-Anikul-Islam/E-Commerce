<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\User;
//use File;
use DB;
use App\Http\Requests;
//use Session;
use Illuminate\Support\Facades\Redirect;

use Cart;
//session_start();

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $quantity=$request->quantity;
        $products_id=$request->products_id;
        $products_info=DB::table('tbl_products')
                        ->where('products_id',$products_id)
                        ->first();

                        // echo "<pre>";
                        //  print_r($products_info);
                        // echo "</pre>"; 
        $data['quantity']=$quantity;
        $data['id']=$products_info->products_id;
        $data['name']=$products_info->products_name;
        $data['price']=$products_info->products_price;
        $data['attributes']['image']=$products_info->products_image;

        Cart::add($data);
        return Redirect::to('/show-cart');


    }


    public function show_cart_list()
    {
        $all_published_category=DB::table('tbl_category')
                             ->where('publication_status',1)
                             ->get();

        $manage_published_category=view('pages.add_to_cart_your_choice')
                        ->with('all_published_category',$all_published_category);
                         return view('mms')
                        ->with('pages.add_to_cart_your_choice',$manage_published_category);  


    }
    public function delete_to_cart($id)
    {
        Cart::remove($id);
             return Redirect::to('/show-cart');  
               
    }

   // public function update_to_cart(Request $request)
   // {
       // $quantity=$request->quantity;
      //  $id=$request->id;

          // Cart::update($id,$quantity);
          // return Redirect::to('/show-cart');  
               
    //}


}
