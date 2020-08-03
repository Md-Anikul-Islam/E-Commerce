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


class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin_login');
    }



     public function all_admin_information()
    {
        $this->AdminAuthCheck();
        $admin_info=DB::table('tbl_admin')->get();
        $manage_admin=view('admin.info_admin')
           ->with('all_admin_information', $admin_info);

        return view('pages.admin_home_contant')
              ->with('admin.info_admin',$manage_admin);
    }

    //public function show_dashboard()
    //{
       // return view('admin.dashboard');
   // }
    
    public function dashboard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);

       
        $result=DB::table('tbl_admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();
       
              if($result)
              {
                Session::put('admin_name',$result->admin_name);
                Session::put('admin_id',$result->admin_id);
                return Redirect::to('/dashboard');

              }
              else
              {
                  Session::put('messege','Email or Password Invalid');
                  return Redirect::to('/admin');
              }


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
