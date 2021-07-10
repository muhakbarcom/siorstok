<style>
	* {
		box-sizing: border-box;
	}

	body {
		font-family: Verdana, sans-serif;
	}

	.mySlides {
		display: none;
	}

	img {
		vertical-align: middle;
	}

	/* Slideshow container */
	.slideshow-container {
		max-width: 1000px;
		position: relative;
		margin: auto;
	}

	/* Caption text */
	.text {
		color: #f2f2f2;
		font-size: 15px;
		padding: 8px 12px;
		position: absolute;
		bottom: 8px;
		width: 100%;
		text-align: center;
	}

	/*  */
	/* Number text (1/3 etc) */
	.numbertext {
		color: #f2f2f2;
		font-size: 12px;
		padding: 8px 12px;
		position: absolute;
		top: 0;
	}

	/* The dots/bullets/indicators */
	.dot {
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.3s ease;
	}

	.active {
		background-color: #717171;
	}

	/* Fading animation */
	.fade {
		-webkit-animation-name: fade;
		-webkit-animation-duration: 1.5s;
		animation-name: fade;
		animation-duration: 1.5s;
	}

	@-webkit-keyframes fade {
		from {
			opacity: .4
		}

		to {
			opacity: 1
		}
	}

	@keyframes fade {
		from {
			opacity: .4
		}

		to {
			opacity: 1
		}
	}

	/* On smaller screens, decrease text size */
	@media only screen and (max-width: 300px) {
		.text {
			font-size: 11px
		}
	}
</style>


<div class="row">
	<p style="text-align: center" class="mx-auto">
		<a href="<?= base_url('auth/login'); ?>"> Login </a> Khusus Petugas
	</p>
</div>
<div class="row" style=" padding: 10px;">
	<div class="col-md-4">

	</div>
	<div class="col-md-4 mx-auto" style="border: 1px solid black; padding: 5px;">
		<center>
			SELAMAT DATANG
		</center>
	</div>
	<div class="col-md-4">

	</div>
</div>

<!-- <div class="row">
	<div class="col-md-12 ">
		<div class="mx-auto"> -->
<div class="slideshow-container">
	<div class="mySlides fade">
		<div class="numbertext">1 / 3</div>
		<img src="<?= base_url('assets/images/background/iklan.jpg'); ?>" class="img-thumbnail">
		<div class="text">Caption Text</div>
	</div>
	<div class="mySlides fade">
		<div class="numbertext">2 / 3</div>
		<img src="<?= base_url('assets/images/background/iklan.jpg'); ?>" class="img-thumbnail">
		<div class="text">Caption Two</div>
	</div>
	<div class="mySlides fade">
		<div class="numbertext">3 / 3</div>
		<img src="<?= base_url('assets/images/background/iklan.jpg'); ?>" class="img-thumbnail">
		<div class="text">Caption Three</div>
	</div>
</div>
<br>
<div>
	<span class="dot"></span>
	<span class="dot"></span>
	<span class="dot"></span>
</div>
<!-- </div>
	</div>
</div> -->

<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">
					Menu Terbaru
				</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<?php foreach ($view_menu_terbaru as $vmt) : ?>
						<div class="col-md-4">
							<center>
								<img src="<?= base_url('/assets/uploads/image/menu/') . $vmt['gambar']; ?>" class="img-thumbnail">
								<br> <?php echo $vmt['nama_menu']; ?>
							</center>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">
					Menu Favorit
				</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<?php foreach ($view_menu_favorit as $vmt) : ?>
						<div class="col-md-4">
							<center>
								<img src="<?= base_url('/assets/uploads/image/menu/') . $vmt['gambar']; ?>" class="img-thumbnail">
								<br> <?php echo $vmt['nama_menu']; ?>
							</center>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mx-auto text-center">
	<div class="col">
		<a class="btn btn-primary" href="<?= base_url('konsumen/order'); ?>">
			Order In Here
		</a>
	</div>
</div>

<script>
	var slideIndex = 0;
	showSlides();

	function showSlides() {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		slideIndex++;
		if (slideIndex > slides.length) {
			slideIndex = 1
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex - 1].style.display = "block";
		dots[slideIndex - 1].className += " active";
		setTimeout(showSlides, 4000); // Change image every 2 seconds
	}
</script>