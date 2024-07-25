<!-- Categories Section Begin -->
<section class="categories">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 p-0">
				<div class="categories__item categories__large__item set-bg"
					data-setbg="<?= base_url('/asset/template/ashion-master/img/categories/category-1.jpg') ?>">
					<div class="categories__text">
						<h1>Women’s fashion</h1>
						<p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
							edolore magna aliquapendisse ultrices gravida.</p>
						<a id="a" href="#">Shop now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 p-0">
						<div class="categories__item set-bg"
							data-setbg="<?= base_url('/asset/template/ashion-master/img/categories/category-2.jpg') ?>">
							<div class="categories__text">
								<h4>Men’s fashion</h4>
								<p>358 items</p>
								<a id="a" href="#">Shop now</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 p-0">
						<div class="categories__item set-bg"
							data-setbg="<?= base_url('/asset/template/ashion-master/img/categories/category-3.jpg') ?>">
							<div class="categories__text">
								<h4>Kid’s fashion</h4>
								<p>273 items</p>
								<a id="a" href="#">Shop now</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 p-0">
						<div class="categories__item set-bg"
							data-setbg="<?= base_url('/asset/template/ashion-master/img/categories/category-4.jpg') ?>">
							<div class="categories__text">
								<h4>Cosmetics</h4>
								<p>159 items</p>
								<a id="a" href="#">Shop now</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 p-0">
						<div class="categories__item set-bg"
							data-setbg="<?= base_url('/asset/template/ashion-master/img/categories/category-5.jpg') ?>">
							<div class="categories__text">
								<h4>Accessories</h4>
								<p>792 items</p>
								<a id="a" href="#">Shop now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="section-title">
					<h4>New product</h4>
				</div>
			</div>
			<div class="col-lg-8 col-md-8">
				<ul class="filter__controls">
					<li class="active" data-filter="*">All</li>
					<li data-filter=".women">Women’s</li>
					<li data-filter=".men">Men’s</li>
					<li data-filter=".kid">Kid’s</li>
					<li data-filter=".accessories">Accessories</li>
					<li data-filter=".cosmetic">Cosmetics</li>
				</ul>
			</div>
		</div>
		<div class="row property__gallery">
			<?php foreach ($viewProduct as $e): ?>
				<div class="col-lg-3 col-md-4 col-sm-6 mix women">
					<div class="product__item">
						<div class="product__item__pic set-bg"
							data-setbg="<?= base_url('/asset/components/image/product/' . $e['image']) ?>">
							<div class="label new">New</div>
							<ul class="product__hover">
								<li><a id="a" href="<?= base_url('/asset/components/image/product/' . $e['image']) ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
								<li><a id="a" href="<?= site_url('Index/detailProduct/'.$e['idProduct']) ?>"><i class="fa-regular fa-eye"></i></a></li>
								<?php if ($this->session->userdata('idUser')): ?>
									<li>
										<?php echo anchor('Index/addToCart/'.$e['idProduct'], '<span class="icon_bag_alt"></span>'); ?>
									</li>
								<?php else: ?>
									<li><a id="a" href="<?= site_url('Login') ?>"><span class="icon_bag_alt"></span></a></li>
								<?php endif; ?>
							</ul>
						</div>
						<div class="product__item__text">
							<h6><a id="a" href="#"><?= $e['name']; ?></a></h6>
							<div class="product__price mt-2">Rp. <?= number_format($e['price']) ?></div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<!-- Product Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="trend__content">
					<div class="section-title">
						<h4>Hot Trend</h4>
					</div>
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/ht-1.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Chain bucket bag</h6>
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
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/ht-2.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Pendant earrings</h6>
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
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/ht-3.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Cotton T-Shirt</h6>
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
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="trend__content">
					<div class="section-title">
						<h4>Best seller</h4>
					</div>
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/bs-1.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Cotton T-Shirt</h6>
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
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/bs-2.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Zip-pockets pebbled tote <br />briefcase</h6>
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
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/bs-3.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Round leather bag</h6>
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
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="trend__content">
					<div class="section-title">
						<h4>Feature</h4>
					</div>
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/f-1.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Bow wrap skirt</h6>
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
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/f-2.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Metallic earrings</h6>
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
					<div class="trend__item">
						<div class="trend__item__pic">
							<img src="<?= base_url('/asset/template/ashion-master/') ?>img/trend/f-3.jpg" alt="">
						</div>
						<div class="trend__item__text">
							<h6>Flap cross-body bag</h6>
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
	</div>
</section>
<!-- Trend Section End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- //?	JS Config Category Page -->
<?php if ($this->session->flashdata('error')): ?>
	<script>
		Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "<?= $this->session->flashdata('error'); ?>",
		});
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
	<script>
		Swal.fire({
			icon: "success",
			title: "Success Add Data",
			text: "<?= $this->session->flashdata('success'); ?>",
		});
	</script>
<?php endif; ?>

<script>
	$(document).ready(function () {
		$('.add-to-cart').click(function (e) {
			e.preventDefault();
			var id = $(this).data('id');
			var name = $(this).data('name');
			var price = $(this).data('price');

			$.ajax({
				url: "<?= site_url('Index/cart') ?>",
				method: "POST",
				data: { id: id, name: name, price: price },
				success: function (response) {
					var data = JSON.parse(response);
					alert(data.message);
					$('#cart-total').text(data.cart_total);
				}
			});
		});
	});
</script>
