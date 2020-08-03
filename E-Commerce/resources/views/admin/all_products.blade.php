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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Product Description</th>
                                  <th>Product Image</th>
                                  <th>Product Price</th>
                                  <th>Category Name</th>
                                  <th>Brand Name</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  


					     	@foreach($all_products_info as $v_products)

					<tbody>
						<tr>
								<td>{{$v_products->products_id}}</td>
								<td class="center">{{$v_products->products_name}}</td>
                                <td class="center">{{$v_products->products_description}}</td>
                                 <td><img src="{{URL::to($v_products->products_image)}}" style="height: 110px; width: 110px;"></td>
								<td class="center">{{$v_products->products_price}} Tk</td>
								<td class="center">{{$v_products->category_name}}</td>
								<td class="center">{{$v_products->brands_name}}</td>


								
								<td class="center">
								@if($v_products->publication_status==1)
									<span class="label label-success">Active</span>
								@else
								    <span class="label label-danger">Unactive</span>
								@endif
								</td>

								<td class="center">
								@if($v_products->publication_status==1)
									<a class="btn btn-success" href="{{URL::to('/active_products/'.$v_products->products_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@else
								    <a class="btn btn-danger" href="{{URL::to('/unactive_products/'.$v_products->products_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@endif

									<a class="btn btn-info" href="{{URL::to('/edit-products/'.$v_products->products_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-products/'.$v_products->products_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
                                   
						 </tbody>

            @endforeach







						 </table>  
						 <div class="pagination pagination-centered">

						 	  
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
			</div><!--/row-->
    
 

@endsection()