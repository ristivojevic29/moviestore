</div>
<div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="Dokumentacija.pdf">Documentation</a></li>
						
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
                    <h4>Menu</h4>
                   <?php $meniUpit = "SELECT * FROM meni WHERE idMeni in('1','5')"; 
     				$meni =executeQuery($meniUpit);?>
						<ul id="futerMeni">
						<li><a href="sitemap.xml">Sitemap</a></li>
                        <?php foreach($meni as $meniLink): ?>
    <li><a href="index.php?page=<?= $meniLink->linkValue?>"><?= $meniLink->linkName ?></a></li>
    <?php endforeach;?>
    <?php if(isset($_SESSION['korisnik'])):
    ?>
    <li><a href='PHP/logout.php'>Logout <?=  $_SESSION['korisnik']->ime ?></a></li>
    <?php endif; ?>
    <?php
    if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->idUloge=="1"):
    ?>
    <li><a href="admin.php">Admin Panel</a></li>
    <?php endif; ?>
    </ul>
    <div class='cleaner'></div>
						
                </div>
                <?php $meniUpit = "SELECT * FROM meni WHERE idMeni in('2','3','6')"; 
     			$meni =executeQuery($meniUpit);
     ?>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul id="myaccount">
                        <?php foreach($meni as $meniLink): ?>
    <li><a href="index.php?page=<?= $meniLink->linkValue?>"><?= $meniLink->linkName ?></a></li>
    <?php endforeach;?>
   
    </ul>
    <div class='cleaner'></div>
						
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+12-34-56789</span></li>
							<li><span>+00-123-456789</span></li>
						</ul>
					
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="https://www.facebook.com/" target="_blank"><img src="assets/images/facebook.png" alt="face" /></a></li>
							      <li><a href="https://twitter.com/?lang=en" target="_blank"><img src="assets/images/twitter.png" alt="tw" /></a></li>
							      <li><a href="https://www.skype.com/en/" target="_blank"><img src="assets/images/skype.png" alt="skype" /> </a></li>
							      <li><a href="https://www.linkedin.com/" target="_blank"> <img src="assets/images/linkedin.png" alt="linkein" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			 <div class="copy_right">
				<p>Branislav Ristivojevic 134/17 © All rights Reserved |</p>
		   </div>			
        </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'Easing.OutInSine' });
			
		});
	</script>
		<a href="#" id="toTop"><span id="toTopHover"> </span></a>
		

</body>
</html>
