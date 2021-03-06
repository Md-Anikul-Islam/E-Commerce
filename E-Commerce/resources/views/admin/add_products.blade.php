@extends('pages.admin_home_contant')
@section('admin_content')
	
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Products</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
					<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Products</h2>
						
					</div>
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
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save-products')}}" enctype="multipart/form-data">
                       @csrf
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="products_name">
							  </div>
							</div>

                    <div class="control-group">
							<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
                    <option>Select Category</option>
                    <?php
						              $all_published_category=DB::table('tbl_category')
												 ->where('publication_status',1)
												 ->get();
						              foreach($all_published_category as $v_category){?>
									    <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                       <?php } ?>
									
								  </select>
								</div>
							</div>


              <div class="control-group">
							<label class="control-label" for="selectError3">Product Brand</label>
								<div class="controls">
								  <select id="selectError3"  name="brands_id">
                    <option>Select Brand</option>
                      <?php
						            $all_published_brands=DB::table('tbl_brands')
												 ->where('publication_status',1)
												 ->get();
						           foreach($all_published_brands as $v_brands){?>
									    <option value="{{$v_brands->brands_id}}">{{$v_brands->brands_name}}</option>
                      <?php } ?>
									
								  </select>
								</div>
							</div>

							       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="products_description" rows="3"></textarea>
							  </div>
							</div>

             <div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="products_price">
							  </div>
							</div>


              <div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="products_image" id="fileInput" type="file">
							  </div>
							</div> 

              <div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="products_size">
							  </div>
							</div>


              <div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="products_color">
							  </div>
							</div>


              <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit"  name="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection()