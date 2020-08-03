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

class CategoryController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.add_category');
    }
    public function all_category()
    {
        $this->AdminAuthCheck();
        $category_info=DB::table('tbl_category')->get();
        $manage_category=view('admin.all_category')
           ->with('all_category_info', $category_info);

        return view('pages.admin_home_contant')
              ->with('admin.all_category',$manage_category);

        //return view('admin.all_category');
    }
    public function save_category(Request $request)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        
        $result=DB::table('tbl_category')->insert($data);

        Session::put('messege','Data are Succesully Inserted');
        return Redirect::to('/add-category');
    }
    public function unactive_category($category_id)
    {
        DB::table('tbl_category')
           ->where('category_id',$category_id)
           ->update(['publication_status' => 1]);
           Session::put('messege','Category Active Succesully');
           return Redirect::to('/all-category');
    }
    public function active_category($category_id)
    {
        DB::table('tbl_category')
           ->where('category_id',$category_id)
           ->update(['publication_status' => 0]);
           Session::put('messege','Category UnActive Succesully');
           return Redirect::to('/all-category');
    }

    public function edit_category($category_id)
    {
        $this->AdminAuthCheck();
        $category_info_all=DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->first();


        $manage_any_category=view('admin.edit_category')
                ->with('all_category_info', $category_info_all);
        return view('pages.admin_home_contant')
                ->with('admin.edit_category', $manage_any_category);        

      
       //return view('admin.edit_category');
    }

 
    public function update_category(Request  $request,$category_id)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;

        DB::table('tbl_category')
           ->where('category_id',$category_id)
           ->update( $data);

        Session::get('messege','Data Update Succesully');
        return Redirect::to('/all-category');
         
    }

    public function delete_category($category_id)
    {
                 $this->AdminAuthCheck();
                 DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->delete();

                Session::get('messege','Data Delete Succesully');
                return Redirect::to('/all-category');

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
