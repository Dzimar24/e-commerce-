<!-- Product Details Section Begin -->
<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="product__details__pic">
					<div class="product__details__pic__left product__thumb nice-scroll">
						<a class="pt active" href="#product-1">
							<img src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> " alt="">
						</a>
						<a class="pt" href="#product-2">
							<img src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> " alt="">
						</a>
						<a class="pt" href="#product-3">
							<img src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> " alt="">
						</a>
						<a class="pt" href="#product-4">
							<img src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> " alt="">
						</a>
					</div>
					<div class="product__details__slider__content">
						<div class="product__details__pic__slider owl-carousel">
							<img data-hash="product-1" class="product__big__img"
								src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> " alt="">
							<img data-hash="product-2" class="product__big__img"
								src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> " alt="">
							<img data-hash="product-3" class="product__big__img"
								src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> " alt="">
							<img data-hash="product-4" class="product__big__img"
								src="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> " alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="product__details__text">
					<h3><?= $viewProduct->name ?></h3>
					<div class="product__details__price">Rp. <?= number_format($viewProduct->price) ?></div>
					<div class="product__details__button">
						<?php echo form_open('Index/addToCartFromDetail/'.$viewProduct->idProduct); ?>
						<div class="quantity">
							<span>Quantity:</span>
							<div class="pro-qty">
								<input type="text" name="qty" id="numberInput" value="1">
							</div>
						</div>
						<button type="submit" class="cart-btn"><span class="add-to-cart">Add to cart</span></button>
						<?php echo form_close();?>
					</div>
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
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="related__title">
					<h5>RELATED PRODUCTS</h5>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="product__item">
					<div class="product__item__pic set-bg"
						data-setbg="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> ">
						<div class="label new">New</div>
						<ul class="product__hover">
							<li><a href="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> "
									class="image-popup"><span class="arrow_expand"></span></a></li>
							<li><a href="#"><span class="icon_heart_alt"></span></a></li>
							<li><a href="#"><span class="icon_bag_alt"></span></a></li>
						</ul>
					</div>
					<div class="product__item__text">
						<h6><a href="#">Buttons tweed blazer</a></h6>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ 59.0</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="product__item">
					<div class="product__item__pic set-bg"
						data-setbg="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> ">
						<ul class="product__hover">
							<li><a href="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> "
									class="image-popup"><span class="arrow_expand"></span></a></li>
							<li><a href="#"><span class="icon_heart_alt"></span></a></li>
							<li><a href="#"><span class="icon_bag_alt"></span></a></li>
						</ul>
					</div>
					<div class="product__item__text">
						<h6><a href="#">Flowy striped skirt</a></h6>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ 49.0</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="product__item">
					<div class="product__item__pic set-bg"
						data-setbg="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> ">
						<div class="label stockout">out of stock</div>
						<ul class="product__hover">
							<li><a href="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> "
									class="image-popup"><span class="arrow_expand"></span></a></li>
							<li><a href="#"><span class="icon_heart_alt"></span></a></li>
							<li><a href="#"><span class="icon_bag_alt"></span></a></li>
						</ul>
					</div>
					<div class="product__item__text">
						<h6><a href="#">Cotton T-Shirt</a></h6>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ 59.0</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="product__item">
					<div class="product__item__pic set-bg"
						data-setbg="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> ">
						<ul class="product__hover">
							<li><a href="<?= base_url('/asset/components/image/product/' . $viewProduct->image) ?> "
									class="image-popup"><span class="arrow_expand"></span></a></li>
							<li><a href="#"><span class="icon_heart_alt"></span></a></li>
							<li><a href="#"><span class="icon_bag_alt"></span></a></li>
						</ul>
					</div>
					<div class="product__item__text">
						<h6><a href="#">Slim striped pocket shirt</a></h6>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ 59.0</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Details Section End -->

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
	$(document).ready(function () {
		$("#numberInput").keypress(function (e) {
			if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
		});
	});
</script>
