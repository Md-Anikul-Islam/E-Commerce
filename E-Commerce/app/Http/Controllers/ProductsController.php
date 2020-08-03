<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use File;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductsController extends Controller
{
   public function index()
   {
       $this->AdminAuthCheck();
       return view('admin.add_products');
   }
   //view all product
   public function all_products()
   {
       $this->AdminAuthCheck();
       $products_info=DB::table('tbl_products')
                             ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                             ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
                             ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
                              ->get();
       $manage_products=view('admin.all_products')
          ->with('all_products_info', $products_info);
       return view('pages.admin_home_contant')
             ->with('admin.all_products',$manage_products);

      
   }
   //all product insert
   public function save_products(Request $request)
   { 
      $this->AdminAuthCheck();
      $data=array();
      $data['products_name']=$request->products_name;
      $data['category_id']=$request->category_id;
      $data['brands_id']=$request->brands_id;
      $data['products_description']=$request->products_description;
      $data['products_price']=$request->products_price;
      $data['products_size']=$request->products_size;
      $data['products_color']=$request->products_color;
      $data['publication_status']=$request->publication_status;

      $image=$request->file('products_image');

      if($image)
      {
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/';
        $image_url= $upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success)
        {
            $data['products_image']=$image_url;

            $result=DB::table('tbl_products')->insert($data);

            Session::put('messege','Data are Succesully Inserted');
            return Redirect::to('/add-products');

        }
      

      }

            $data['products_image']='';
            $result=DB::table('tbl_products')->insert($data);
            Session::put('messege','Data are Succesully Inserted');
            return Redirect::to('/add-products');

    }

    public function active_products($products_id)
    {
        DB::table('tbl_products')
        ->where('products_id',$products_id)
        ->update(['publication_status' => 0]);
        Session::put('messege','Products UnActive Succesully');
        return Redirect::to('/all-products');
        
    }

    public function unactive_products($products_id)
    {
        DB::table('tbl_products')
        ->where('products_id',$products_id)
        ->update(['publication_status' => 1]);
        Session::put('messege','Products Active Succesully');
        return Redirect::to('/all-products');
        
    }



    public function edit_products($products_id)
    {
        $this->AdminAuthCheck();
        $products_info_all=DB::table('tbl_products')
                ->where('products_id', $products_id)
                ->first();


        $manage_any_products=view('admin.edit_products')
                ->with('all_products_info', $products_info_all);
        return view('pages.admin_home_contant')
                ->with('admin.edit_products', $manage_any_products);        

      
       //return view('admin.edit_products');
    }

 
    public function update_products(Request  $request,$products_id)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['products_name']=$request->products_name;
        $data['products_description']=$request->products_description;
        $data['products_price']=$request->products_price;
        $image=$request->file('products_image');

        DB::table('tbl_products')
           ->where('products_id',$products_id)
           ->update( $data);

        Session::get('messege','Data Update Succesully');
        return Redirect::to('/all-products');
         
    }

    public function delete_products($products_id)
    {
                 $this->AdminAuthCheck();
                 $result=DB::table('tbl_products')->where('products_id',$products_id)->first();
                 $image=$result->products_image;
                 DB::table('tbl_products')
                ->where('products_id',$products_id)
                ->delete();
                unlink($image);

                Session::get('messege','Data Delete Succesully');
                return Redirect::to('/all-products');

    }
    public function AdminAuthCheck()
    {
      $admin_id=Session::get('admin_id');
      if($admin_id)
      {
        return;
      }
      else
      {
        return Redirect::to('/admin')->send();
      }
    }


  

}
