
<div class="header">
<div class="headertop_desc">
			<div class="wrap">
				<?php include "nav.php";?>
				<div class="clear"></div>
			</div>
	  	</div>
  	  		<div class="wrap">
				<div class="header_top">
					<div class="logo">
						<a href="index.php"><h1><img src="assets/images/logo.png" alt="logo" /></h1></a>
					</div>
						<div class="header_top_right">
						<?php if(isset($_GET['page'])):?>
							<?php	$strana=$_GET['page'];
								if($strana=='Home' || $strana=='1' || $strana=='2'):
							?>
						  <div class="cart">
						  	   <p><span id="kartica"><a href="#">Cart</a></span><div id="dd" class="wrapper-dropdown-2">(empty)
						  	   	<ul class="dropdown">
										<li id="noItems">you have no items in your Shopping cart</li>
								</ul></div></p>
						  </div>
						  <?php endif;?>
								<?php endif;?>
								<?php if(!isset($_GET['page'])):?>
								<div class="cart">
						  	   <p><span id="kartica"><a href="#">Cart</a></span><div id="dd" class="wrapper-dropdown-2">(empty)
						  	   	<ul class="dropdown">
										<li id="noItems">you have no items in your Shopping cart</li>
								</ul></div></p>
						  </div>
								<?php endif;?>
						 <div class="clear"></div>
					</div>
					<!-- objektni js -->
						  <script type="text/javascript">
								function DropDown(el) {
									this.dd = el;
									this.initEvents();
								}
								DropDown.prototype = {
									initEvents : function() {
										var obj = this;
					
										obj.dd.on('click', function(event){
											$(this).toggleClass('active');
											event.stopPropagation();
										});	
									}
								}
					
								$(function() {
					
									var dd = new DropDown( $('#dd') );
					
									$(document).click(function() {
										// all dropdowns
										$('.wrapper-dropdown-2').removeClass('active');
									});
					
								});
					    </script>
			 <div class="clear"></div>
  		</div>     