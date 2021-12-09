<!--================Footer Area =================-->
	<footer class="footer_area">
		<div class="container">
			<div class="row footer_inner">
				<div class="col-lg-12 col-sm-12">
					<aside class="f_widget ab_widget">
						
						<p>&copy; <?php echo date('Y'); ?> All rights reserved | Serempe</p>
					</aside>
				</div>
				
			</div>
		</div>
	</footer>

	<!--================End Footer Area =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?php echo url('landing/js/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?php echo url('landing/js/popper.js'); ?>"></script>
	<script src="<?php echo url('landing/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo url('landing/js/stellar.js'); ?>"></script>
	<script src="<?php echo url('landing/js/jquery.magnific-popup.min.js'); ?>"></script>
	<script src="<?php echo url('landing/vendors/lightbox/simpleLightbox.min.js'); ?>"></script>	
	<script src="<?php echo url('landing/vendors/nice-select/js/jquery.nice-select.min.js'); ?>"></script>
	<script src="<?php echo url('landing/vendors/isotope/imagesloaded.pkgd.min.js'); ?>"></script>
	<script src="<?php echo url('landing/vendors/isotope/isotope-min.js'); ?>"></script>
	<script src="<?php echo url('landing/vendors/owl-carousel/owl.carousel.min.js'); ?>"></script>
	<script src="<?php echo url('landing/js/jquery.ajaxchimp.min.js'); ?>"></script>
	<script src="<?php echo url('landing/vendors/counter-up/jquery.waypoints.min.js'); ?>"></script>
	<script src="<?php echo url('landing/vendors/counter-up/jquery.counterup.min.js'); ?>"></script>
	
	<!-- contact js -->
        <script src="<?php echo url('landing/js/jquery.form.js'); ?>"></script>
        <script src="<?php echo url('landing/js/jquery.validate.min.js'); ?>"></script>
        <script src="<?php echo url('landing/js/contact.js'); ?>"></script>
	

	<script src="<?php echo url('landing/js/theme.js'); ?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
	    $('#city').on('keyup', function() {

	        var key = $(this).val();		
	        var dataString = 'key='+key;

		$.ajax({
	            type: "POST",
	            url: "<?php echo url("city/ajax/");?>"+key,
	            data: dataString,
	            success: function(data) {
	                //Escribimos las sugerencias que nos manda la consulta
	                $('#suggestions').fadeIn(1000).html(data);
	                //Al hacer click en alguna de las sugerencias
	                $('.suggest-element').on('click', function(){
	                        //Obtenemos la id unica de la sugerencia pulsada
	                        var id = $(this).attr('id');
	                        //Editamos el valor del input con data de la sugerencia pulsada

	                        $('#city').val($(this).attr('data'));
	                        $('#cityhidden').val($(this).attr('id'));
	                        //Hacemos desaparecer el resto de sugerencias
	                        $('#suggestions').fadeOut(1000);
	                        return false;
	                });
	            }
	        });
	    });
	}); 
	</script>
	

	