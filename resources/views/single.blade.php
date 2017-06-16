@extends('layouts.app')
@section('content')

       <div class="single">
         <div class="wrap">
     	    <div class="rsidebar span_1_of_left">
				   <section class="sky-form">
                   	  <h4>PRODUCT CATEGORY</h4>
                   	  @foreach ($categories as $category)
						<div class="col col-4">
							<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>{{$category->title}}</label>
						</div>
					   @endforeach
				  </section>
				  <div class="clear"></div>
		          <section class="sky-form">
					<h4>BRANDS</h4>
					@foreach ($brands as $brand)
						<div class="col col-4">
								<label class="checkbox"><input name="checkbox" type="checkbox"><i></i>{{$brand->title}}</label>
						</div>

					@endforeach
		         </section>
		</div>
		<div class="cont span_2_of_3">
			  <div class="labout span_1_of_a1">
			<img class="etalage_source_image" src="{{ asset("/images/uploads/$products->preview_photo") }}">
					
					
			<!-- end product_slider -->
			</div>
			<div class="cont1 span_2_of_a1">
				<h3 class="m_3">{{$products->title}}</h3>
				
				<div class="price_single">
							  <!--<span class="reducedfrom">$66.00</span> -->
							  <span class="actual">{{$products->price}}</span>
							</div>
				<!--<ul class="options">
					<h4 class="m_9">Select a Size</h4>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a></li>
					<div class="clear"></div>
				</ul> -->
				<div class="btn_form">
				   <form>
					 <input value="buy then" title="" type="submit">
				  </form>
				</div>
				<!--<ul class="add-to-links">
    			   <li><img src="images/wish.png" alt=""><a href="#">Add to wishlist</a></li>
    			</ul> -->
    			<h3 class="m_3">Product Details</h3>
     			<p class="m_text">{{$products->description}}.</p>
    			
                <!--<div class="social_single">	
				   <ul>	
					  <li class="fb"><a href="#"><span> </span></a></li>
					  <li class="tw"><a href="#"><span> </span></a></li>
					  <li class="g_plus"><a href="#"><span> </span></a></li>
					  <li class="rss"><a href="#"><span> </span></a></li>		
				   </ul>
			    </div> -->
			</div>
			<div class="clear"></div>
     
     <!--
         <div class="nbs-flexisel-container"><div class="nbs-flexisel-inner"><ul id="flexiselDemo3" class="nbs-flexisel-ul" style="left: -187.2px; display: block;">
		
		 <li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic8.jpg"><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic7.jpg"><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic11.jpg"><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic10.jpg"><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic9.jpg"><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic8.jpg"><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic7.jpg"><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic11.jpg"><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic10.jpg"><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li><li class="nbs-flexisel-item" style="width: 187.2px;"><img src="images/pic9.jpg"><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li></ul><div class="nbs-flexisel-nav-left" style="top: 75px;"></div><div class="nbs-flexisel-nav-right" style="top: 75px;"></div></div></div>

		
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
-->
     </div>
     <div class="clear"></div>
	 </div>
  </div>
@endsection