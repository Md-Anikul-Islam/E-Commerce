@extends('mms')
@section('contant')


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
									
									<input class="cart_quantity_input" type="text" name="quantity" value="{{($v_contants->quantity)}}" autocomplete="off" size="2">			
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contants->price*$v_contants->quantity}}</p>
							</td>
							
						</tr>

					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>




<section id="do_action">
	<div class="container">
		
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							<p class="text-center">Created with bootsrap button and using radio button</p>
					</div>
				
					
          <form method="post" action="{{url('/order-place')}}">
					@csrf
					<div class="d-block my-3">

					      <div class="custom-control custom-radio">
                  <input id="credit" name="payment_method" type="radio" class="custom-control-input" value="handcash" checked required>
                  <label class="custom-control-label" for="credit">Hand Cash</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="credit" name="payment_method" type="radio" class="custom-control-input" value="creditcard" checked required>
                  <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" name="payment_method" type="radio" class="custom-control-input" value="debitcard" required>
                  <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal" name="payment_method" type="radio" class="custom-control-input" value="paypal" required>
                  <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
								<div class="custom-control custom-radio">
                  <input id="paypal" name="payment_method" type="radio" class="custom-control-input" value="bkash" required>
                  <label class="custom-control-label" for="paypal">bKash </label>
                </div>
								<div class="custom-control custom-radio">
                  <input id="paypal" name="payment_method" type="radio" class="custom-control-input" value="dbbl" required>
                  <label class="custom-control-label" for="paypal">DBBL</label>
                </div>
				</div>
			
				  <div>
              <button name="submit" class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
					</div>
					</form>

				
				
	</div>
</section><!--/#do_action-->



@endsection