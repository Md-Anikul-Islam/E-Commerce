@extends('mms')
@section('contant')


<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($product_by_details->products_image)}}" alt="" /> 
								<h3>ZOOM</h3>
							</div>
						</div>


						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
							
								<h2>{{($product_by_details->products_name)}}</h2>
								<p>Color: {{($product_by_details->products_color)}}</p>
	
								<p><b>Availability:</b> In Stock</p>
                                <p><b>Size: {{($product_by_details->products_size)}}</b></p>
								<p><b>Category: {{($product_by_details->category_name)}}</b></p>
								<p><b>Brand: {{($product_by_details->brands_name)}}</b></p>

								<span>
									<span>{{($product_by_details->products_price)}} Tk</span>
									<form action="{{url('/add-to-cart')}}" method="post">
									@csrf
									<label>Quantity:</label>
									<input name="quantity" type="number" value="1" /><br>
									<input type="hidden" name="products_id" value="{{($product_by_details->products_id)}}"/><br>
									<button type="submit" name="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									</form>
								</span>
                              
							
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->



                 <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
				        <div class="tab-pane fade" id="details" >
                        <p>{{($product_by_details->products_description)}}</p>
                        </div>
				</div><!--/category-tab-->
					
</div>
					


@endsection