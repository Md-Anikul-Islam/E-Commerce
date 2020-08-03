<!DOCTYPE html>
<html lang="en">
<head>


                                                    <!--all design link -->



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Online-Shopping</title>
    <link href="{{asset('public/design/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/design/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/design/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/design/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/design/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/design/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/design/css/responsive.css')}}" rel="stylesheet">    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('public/design/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('public/design/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('public/design/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('public/design/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>



                                                  <!--Fornt Part Design 0 -->




<body>
	<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>+088 01905256528</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>anikul.islam01@northsouth.edu</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/login"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://bd.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>




		                                        <!-- Fornt menu design part 1  -->


		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<!-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> -->


								<?php  $customer_id= Session::get('customer_id'); 
								
								
								
								// $shipping_id= Session::get('shipping_id');
								// print_r($shipping_id);
								
								// print_r($customer_id);
								
								?>


                                      



								<?php if($customer_id != NULL) {?>
								<?php }else{?>
								<li><a href="{{URL::to('/login-check')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<?php } ?>
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>



							

								<?php  $customer_id= Session::get('customer_id');    ?>

                                <?php if($customer_id != NULL) {?>
                               <li><a href="{{URL::to('/customer-logout')}}"><i class="fa fa-lock"></i>Logout</a></li>

                               <?php }else{?>
                               <li><a href="{{URL::to('/login-check')}}"><i class="halflings-icon off"></i>Login</a></li>

                               <?php } ?>
       


					 




							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>




		                                        <!--fornt menu design part 2 -->

	
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="http://localhost/E-Commerce/" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    
										
										<li><a href="{{URL::to('/login-check')}}">Checkout</a></li> 
										<li><a href="{{URL::to('/show-cart')}}">Cart</a></li> 
										
                                    </ul>
                                </li> 
							    <li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


	                                           <!--this tag are use for slider design -->
	
@yield('slider');




                                  <!--this are category dynamically connected to admin page design -->

      <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian">
						
						<?php
						 $all_published_category=DB::table('tbl_category')
												 ->where('publication_status',1)
												 ->get();
						foreach($all_published_category as $v_category){?>
                         
					    <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$v_category->category_id)}}">{{($v_category->category_name)}}</a></h4>
								</div>
							</div>
						<?php } ?>
					   	</div>








						               <!--this are brands dynamically connected to admin page design -->
					
						<div class="brands_products">
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">

								<?php
						                $all_published_brands=DB::table('tbl_brands')
												 ->where('publication_status',1)
												 ->get();
						                foreach($all_published_brands as $v_brands){?>


									<li><a href="{{URL::to('/product_by_brands/'.$v_brands->brands_id)}}"> <span class="pull-right">new</span>{{($v_brands->brands_name)}}</a></li>
									<?php } ?>


									
								</ul>
							  
							</div>
						</div>










						                        <!--this are price range page design -->


						<div class="price-range">
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div>
						
						<div class="shipping text-center">
							<img src="images/home/shipping.jpg" alt="" />
						</div>	
					</div>
				</div>
				


				                           <!--this are connected all page link dynamically  -->


				<div class="col-sm-9 padding-right">
					<div class="features_items">
				
					@yield('contant')
				</div>
			</div>
		</div>
	</section>



                                                  <!--this are page basic design  -->








	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Online</span>Shopping</h2>
							<p>Choice your Product and gift other</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{URL::to('public/design/images/home/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{URL::to('public/design/images/home/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{URL::to('public/design/images/home/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{URL::to('public/design/images/home/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>2019</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{URL::to('public/design/images/home/map.png')}}" alt="" />
							<p>Bangladesh,Dhaka</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Billing System</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Md Anikul Islam © 2019 Online - Shopping.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Md Anikul Islam</a></span></p>
				</div>
			</div>
		</div>
		
	</footer>
	
    <script src="{{asset('public/design/js/jquery.js')}}"></script>
	<script src="{{asset('public/design/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/design/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/design/js/price-range.js')}}"></script>
    <script src="{{asset('public/design/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/design/js/main.js')}}"></script>
</body>
</html>