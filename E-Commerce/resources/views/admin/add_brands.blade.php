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
					<a href="#">Add Brands</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
					<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brands</h2>
						
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
						<form class="form-horizontal" method="post" action="{{url('/save-brands')}}">
            @csrf
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Brands Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="brands_name">
							  </div>
							</div>

							       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Brands Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="brands_description" rows="3"></textarea>
							  </div>
							</div>


                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Brands Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit"  name="submit" class="btn btn-primary">Brands Add</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection()