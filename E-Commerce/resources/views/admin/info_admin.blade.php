@extends('pages.admin_home_contant')
@section('admin_content')
	
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			<p class="alert-success">
					<?php
					$messege=Session::get('messege');
					     if($messege)
							 {
								 echo $messege;
								 Session::put('messege',null);
							 }
					
					?>
			</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Admin</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					   <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Admin Id</th>
								  <th>Admin Name</th>
								  <th>Admin Email</th>
								  <th>Admin Phone</th>
								 
							  </tr>
						  </thead>  


						  @foreach($all_admin_information as $v_admin)

						  <tbody>
							<tr>								
								<td class="center">{{$v_admin->admin_id}}</td>
								<td class="center">{{$v_admin->admin_name}}</td>
								<td class="center">{{$v_admin->admin_email}}</td>
								<td class="center">{{$v_admin->admin_phone}}</td>
							</tr>  
						 </tbody>

                        @endforeach
						 </table>  
						   
					</div>
				</div><!--/span-->
			</div><!--/row-->	
						

@endsection