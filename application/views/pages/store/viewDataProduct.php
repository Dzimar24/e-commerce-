<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Ashion Template">
	<meta name="keywords" content="Ashion, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Name Company | Motto</title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
		rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="<?= base_url('/asset/template/ashion-master/') ?>css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('/asset/template/ashion-master/') ?>css/font-awesome.min.css"
		type="text/css">
	<link rel="stylesheet" href="<?= base_url('/asset/template/ashion-master/') ?>css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('/asset/template/ashion-master/') ?>css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('/asset/template/ashion-master/') ?>css/magnific-popup.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('/asset/template/ashion-master/') ?>css/owl.carousel.min.css"
		type="text/css">
	<link rel="stylesheet" href="<?= base_url('/asset/template/ashion-master/') ?>css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('/asset/template/ashion-master/') ?>css/style.css" type="text/css">
</head>

<body>
	<style>
		.containerBox {
			display: flex;
			align-items: center;
		}

		.textTitle {
			color: black;
			font-size: 20px;
			margin-top: 20px;
		}

		.lineText {
			height: 1px;
			width: 50%;
			/* Garis mengambil lebar maksimum */
			background-color: black;
			margin: 0 200px;
			/* Jarak antara garis dan teks */
		}

		.cok {
			height: 50px;
			width: 150px;
			border: 1px solid #ebebeb;
			border-radius: 50px;
			padding: 0 20px;
			overflow: hidden;
			display: inline-block;
		}

		.cok input {
			font-size: 14px;
			color: #666666;
			font-weight: 500;
			border: none;
			float: left;
			width: 84px;
			text-align: center;
			height: 48px;
			pointer-events: none;
		}

		.buttonBack {
			margin-left: 150px;
			margin-top: 25px;
		}

		button {
			font-size: 15px;
			min-width: 130px;
			height: 40px;
			color: #fff;
			padding: 5px 10px;
			/* font-weight: bold; */
			cursor: pointer;
			transition: all 0.3s ease;
			position: relative;
			display: inline-block;
			outline: none;
			border-radius: 5px;
			z-index: 0;
			background: #fff;
			overflow: hidden;
			border: 2px solid #C84545;
			color: #C84545;
		}

		button:hover {
			color: #fff;
		}

		button:hover:after {
			width: 100%;
		}

		button:after {
			content: "";
			position: absolute;
			z-index: -1;
			transition: all 0.3s ease;
			left: 0;
			top: 0;
			width: 0;
			height: 100%;
			background: #C84545;
		}
	</style>
	<!-- Title Page -->

	<div class="containerBox">
		<div class="lineText"></div>
		<div class="textTitle"><?= $titlePage ?></div>
		<div class="lineText"></div>
	</div>
	<!-- Title Page End -->

	<!-- Button Back -->
	<div class="buttonBack">
		<?php echo form_open('/store/Product/product/' . $viewProduct->idUser); ?>
		<button type="submit">Back</button>
		<?php echo form_close(); ?>
	</div>

	<!-- Product Details Section Begin -->
	<section class="product-details spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product__details__pic">
						<div class="product__details__slider__content">
							<div class="product__details__pic__slider owl-carousel">
								<img data-hash="product-1" class="product__big__img"
									src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?>" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product__details__text">
						<h3><?= $viewProduct->name ?></h3>
						<div class="product__details__price">Rp. <?= number_format($viewProduct->price) ?></div>
						<div class="product__details__widget">
							<ul>
								<li>
									<span>Stock Product :</span>
									<p><?= $viewProduct->stock ?></p>
								</li>
								<li>
									<span>Category Product :</span>
									<p><?= $viewProduct->categoryName ?></p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="product__details__tab">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tabs-1" role="tabpanel">
								<h6>Description</h6>
								<p><?= $viewProduct->description ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Details Section End -->

	<!-- Js Plugins -->
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/jquery-ui.min.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/mixitup.min.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/jquery.countdown.min.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/jquery.slicknav.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/owl.carousel.min.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url('/asset/template/ashion-master/') ?>js/main.js"></script>
</body>

</html>
