<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?php echo url(''); ?>"><h2>Serempe Test</h2></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-center">
				
							
							<?php
								if(!isset($_SESSION['idis'])){
									?>
										<li class="nav-item"><a class="nav-link" href="<?php echo url('user/login'); ?>">Login</a></li>
									<?php
								}
								else{
									?>

										<li class="nav-item"><a class="nav-link" href="<?php echo url('clients'); ?>">Clients List</a></li>
										<li class="nav-item"><a class="nav-link" href="<?php echo url('users'); ?>">Users List</a></li>
										<li class="nav-item"><a class="nav-link" href="<?php echo url('cities'); ?>">Cities List</a></li>
										<li class="nav-item"><a class="nav-link" href="<?php echo url('user/logout'); ?>">Logout</a></li>
									<?php
								}
							?>							
							
						</ul>
						
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->