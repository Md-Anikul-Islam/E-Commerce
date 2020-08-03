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

class BrandsController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.add_brands');
    }
    public function all_brands()
    {
        $this->AdminAuthCheck();
        $brands_info=DB::table('tbl_brands')->get();
        $manage_brands=view('admin.all_brands')
           ->with('all_brands_info', $brands_info);

        return view('pages.admin_home_contant')
              ->with('admin.all_brands',$manage_brands);

        //return view('admin.all_brands');
    }
    public function save_brands(Request $request)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['brands_id']=$request->brands_id;
        $data['brands_name']=$request->brands_name;
        $data['brands_description']=$request->brands_description;
        $data['publication_status']=$request->publication_status;
        
        $result=DB::table('tbl_brands')->insert($data);

        Session::put('messege','Data are Succesully Inserted');
        return Redirect::to('/add-brands');
    }
    public function unactive_brands($brands_id)
    {
        DB::table('tbl_brands')
           ->where('brands_id',$brands_id)
           ->update(['publication_status' =>1]);
           Session::put('messege','Brands Active Succesully');
           return Redirect::to('/all-brands');
    }
    public function active_brands($brands_id)
    {
        DB::table('tbl_brands')
           ->where('brands_id',$brands_id)
           ->update(['publication_status' =>0]);
           Session::put('messege','Brands UnActive Succesully');
           return Redirect::to('/all-brands');
    }

    public function edit_brands($brands_id)
    {
        $this->AdminAuthCheck();
        $brands_info_all=DB::table('tbl_brands')
                ->where('brands_id', $brands_id)
                ->first();


        $manage_any_brands=view('admin.edit_brands')
                ->with('all_brands_info', $brands_info_all);
                return view('pages.admin_home_contant')
                ->with('admin.edit_brands', $manage_any_brands);        

      
       //return view('admin.edit_brands');
    }

 
    public function update_brands(Request  $request,$brands_id)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['brands_name']=$request->brands_name;
        $data['brands_description']=$request->brands_description;

        DB::table('tbl_brands')
           ->where('brands_id',$brands_id)
           ->update( $data);

        Session::get('messege','Data Update Succesully');
        return Redirect::to('/all-brands');
         
    }

    public function delete_brands($brands_id)
    {
                 $this->AdminAuthCheck();
                 DB::table('tbl_brands')
                ->where('brands_id',$brands_id)
                ->delete();

                Session::get('messege','Data Delete Succesully');
                return Redirect::to('/all-brands');

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
