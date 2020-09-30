<div class="header_bottom">
					<div class="header_bottom_left">				
						<div class="categories">
                            <ul id="kategorije">
                               
                          </ul>
						</div>					
		  	         </div>
						    <div class="header_bottom_right">					 
						 	    <!------ Slider ------------>
								  <div class="slider">
							      	<div class="slider-wrapper theme-default">
							            <div id="slider" class="nivoSlider">
							                <img src="assets/images/1.jpg" data-thumb="images/1.jpg" alt="slajder1" />
							                <img src="assets/images/2.jpg" data-thumb="images/2.jpg" alt="slajder2" />
							                <img src="assets/images/3.jpg" data-thumb="images/3.jpg" alt="slajder3" />
							                <img src="assets/images/4.jpg" data-thumb="images/4.jpg" alt="slajder4" />
							                 <img src="assets/images/5.jpg" data-thumb="images/5.jpg" alt="slajder5" />
							            </div>
							        </div>
						   		</div>
						<!------End Slider ------------>
			         </div>
			     <div class="clear"></div>
			</div>
   		</div>
   </div>
   <?php if(isset($_SESSION['korisnik'])): ?>
    <input type="hidden" id="sakriveno" value="<?=  $_SESSION['korisnik']->idKorisnik ?>">
    <?php endif;?>

  <div class="main">
  	<div class="wrap">
      <div class="content">
    	<div class="content_top">
    		<div class="heading">
				<h3 id="zanr">All Products</h3>
				<div id="sortiranje">
					<p><a href="#" data-id="1" class="sort" id="PriceAsc">Sort by Price(Asc)</a></p>
					<p><a href="#" data-id="2" class="sort" id="PriceDesc">Sort by Price(Desc)</a></p>
					</div>
               </div>
    	</div>
	      <div class="section group" id="sekcija">
              
                     </div>	
                    <div id="paginacija"></div> 			     
				</div>
			</div>
       </div>
  </div>
</div>
<script src="assets/js/filtriraj.js"></script>
<script src="assets/js/main.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>