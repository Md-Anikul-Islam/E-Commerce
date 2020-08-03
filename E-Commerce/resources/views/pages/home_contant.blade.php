@extends('mms')
@section('contant')
@include('slider')
<h2 class="title text-center">Features All Items</h2>
  <?php foreach($published_products_info as $v_published_products){?>

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($v_published_products->products_image)}}" style="height:250px;" alt="" />
											<h2>{{($v_published_products->products_price)}} Tk</h2>
											<p>{{($v_published_products->products_name)}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2>{{($v_published_products->products_price)}} Tk</h2>
											<a href="{{URL::to('/view_products/'.$v_published_products->products_id)}}"><p>{{($v_published_products->products_name)}}</p></a>
												<a href="{{URL::to('/view_products/'.$v_published_products->products_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>{{($v_published_products->brands_name)}}</a></li>
										<li><a href="{{URL::to('/view_products/'.$v_published_products->products_id)}}"><i class="fa fa-plus-square"></i>view product</a></li>
									</ul>
								</div>
							</div>
						</div>
		 <?php } ?>	
		</div><!--features_items-->

					                                                   <!-- Brand Wise Product Show -->



					<div class="category-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
							             <?php
						                $all_published_brands=DB::table('tbl_brands')
												 ->where('publication_status',1)
												 ->get();
						                foreach($all_published_brands as $v_brands){?>
									    <li><a href="{{URL::to('/product_by_brands/'.$v_brands->brands_id)}}"> <span class="pull-right"></span>{{($v_brands->brands_name)}}</a></li>
									    <?php } ?>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{URL::to($v_published_products->products_image)}}"/>
												
											</div>
											
										</div>
									</div>
								</div>
							
						
						
							</div>
					</div><!--/category-tab-->
					
				
@endsection