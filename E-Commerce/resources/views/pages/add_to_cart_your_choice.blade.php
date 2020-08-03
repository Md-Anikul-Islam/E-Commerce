@extends('mms')
@section('contant')


                            <!--card element declartion-->

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			<?php
			  $contents=Cart::getContent();
			?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="image">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>



					         <!--card takes value show-->



					<tbody>
					<?php foreach($contents as $v_contants) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_contants->attributes->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{($v_contants->name)}}</a></h4>
							
							</td>
							<td class="cart_price">
								<p>{{($v_contants->price)}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{($v_contants->quantity)}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
                   <!--
								<form action="{{url('/update-cart')}}" method="post">
								@csrf	
									<input class="cart_quantity_input" type="text" name="quantity" value="{{($v_contants->quantity)}}" autocomplete="off" size="2">
									<input type="hidden" name="quantity" value="{{($v_contants->id)}}">
									<input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
								</form>

                   -->




				                <!-- <div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('/cart-update/'.$v_contants->products_id.'/1')}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{($v_contants->quantity)}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="{{url('/cart-update/'.$v_contants->products_id.'/-1')}}"> - </a>
								</div> -->


							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contants->price*$v_contants->quantity}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contants->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>



	                         <!--card total take calculation part-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
		
			<div class="col-sm-9">
				<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::getSubTotal()}}</span></li>
						
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::getTotal()}}</span></li>
						</ul>
						
							<a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection