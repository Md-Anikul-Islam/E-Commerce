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

class SliderController extends Controller
{
    public function index()
   {
       $this->AdminAuthCheck();
       return view('admin.add_slider');
   }

   public function all_slider()
   {
       $this->AdminAuthCheck();
       $slider_info=DB::table('tbl_slider')->get();
       $manage_slider=view('admin.all_slider')
          ->with('all_slider_info', $slider_info);

       return view('pages.admin_home_contant')
            ->with('admin.all_slider',$manage_slider);
   }


   public function save_products(Request $request)
   { 
      $this->AdminAuthCheck();
      $data=array();
    
      $data['slider_id']=$request->slider_id;
      $data['publication_status']=$request->publication_status;

      $image=$request->file('slider_image');

      if($image)
      {
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/slider/';
        $image_url= $upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success)
        {
            $data['slider_image']=$image_url;

            $result=DB::table('tbl_slider')->insert($data);

            Session::put('messege','Data are Succesully Inserted');
            return Redirect::to('/add-slider');

        }
      

      }

            $data['slider_image']='';
            $result=DB::table('tbl_slider')->insert($data);
            Session::put('messege','Data are Succesully Inserted');
            return Redirect::to('/add-slider');

    }

    public function active_slider($slider_id)
    {
        DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->update(['publication_status' => 0]);
        Session::put('messege','Slider UnActive Succesully');
        return Redirect::to('/all-slider');
        
    }

    public function unactive_slider($slider_id)
    {
        DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->update(['publication_status' => 1]);
        Session::put('messege','Slider Active Succesully');
        return Redirect::to('/all-slider');
        
    }

    public function delete_slider($slider_id)
    {
                 $this->AdminAuthCheck();
                 DB::table('tbl_slider')
                ->where('slider_id',$slider_id)
                ->delete();

                Session::get('messege','Data Delete Succesully');
                return Redirect::to('/all-slider');

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
