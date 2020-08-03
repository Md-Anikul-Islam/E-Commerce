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

class MarcateManagementController extends Controller
{
    public function index()
    {
        $published_products_info=DB::table('tbl_products')
                             ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                             ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
                             ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
                             ->where('tbl_products.publication_status',1)
                              ->paginate(6); 
                             // ->limit(9)
                            

        $manage_published_products=view('pages.home_contant')
                        ->with('published_products_info', $published_products_info);
                         return view('mms')
                        ->with('pages.home_contant',$manage_published_products);
        //return view('pages.home_contant');//Use home_contant.blade.php file extention
    }
    //Catagory wise product show
    public function show_product_by_category($category_id)
    {
        $product_by_category=DB::table('tbl_products')
                             ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                             ->select('tbl_products.*','tbl_category.category_name')
                             ->where('tbl_category.category_id',$category_id)
                             ->where('tbl_products.publication_status',1)
                             ->limit(6)
                             ->get();

        $manage_product_by_category=view('pages.category_by_product')
                        ->with('product_by_category', $product_by_category);
                         return view('mms')
                        ->with('pages.category_by_product',$manage_product_by_category);  
    }



     //Brands wise product show
    public function show_product_by_brands($brands_id)
    {
        $product_by_brands=DB::table('tbl_products')
                             ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
                             ->select('tbl_products.*','tbl_brands.brands_id')
                             ->where('tbl_brands.brands_id',$brands_id)
                             ->where('tbl_products.publication_status',1)
                             ->limit(6)
                             ->get();

        $manage_product_by_brands=view('pages.brands_by_product')
                        ->with('product_by_brands', $product_by_brands);
                         return view('mms')
                        ->with('pages.brands_by_product',$manage_product_by_brands);  
    }

    public function products_details_by_id($products_id)
    {
        $product_by_details=DB::table('tbl_products')
                             ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                             ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
                             ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
                             ->where('tbl_products.products_id',$products_id)
                             ->where('tbl_products.publication_status',1)
                            ->first();

        $manage_product_by_details=view('pages.product_details')
                        ->with('product_by_details', $product_by_details);
                         return view('mms')
                        ->with('pages.product_details',$manage_product_by_details);  
    }

 
}
