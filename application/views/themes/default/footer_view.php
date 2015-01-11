<div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Company 2013</p>
                </div>
            </div>
        </footer>

    </div>

	    <script src="<?php echo theme_assets_url(); ?>js/jquery-1.10.2.js"></script>
	    <script src="<?php echo theme_assets_url(); ?>js/bootstrap.js"></script>
	    <script src="<?php echo theme_assets_url(); ?>js/modern-business.js"></script>

		<script>
			$(function() {
		    	$('.tooltips').tooltip();
		    	$('.popovers').popover();
		    	

				setInterval(function() {
			      $('.messages').fadeOut();
				}, 2000);

				$('.carousel').carousel({
		        interval: 5000 //changes the speed
		    })
			});


		</script>

	</body>
</html>