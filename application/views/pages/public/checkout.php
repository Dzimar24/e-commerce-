<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="<?= site_url('Index') ?>"><i class="fa fa-home"></i> Home</a>
					<span>Transaction</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<style>
	#text-ellipsis {
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		width: 110px;
		display: inline-block;
	}
</style>

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
					here to enter your code.</h6>
			</div>
		</div>
		<form action="#" class="checkout__form">
			<div class="row">
				<div class="col-lg-8">
					<h5>Billing detail</h5>
					<div class="row">
						<div class="col-lg-12">
							<div class="checkout__form__input">
								<p>Name <span>*</span></p>
								<input type="text" value="<?= $dataUser->name; ?>">
							</div>
							<div class="checkout__form__input">
								<p>Address <span>*</span></p>
								<input type="text" placeholder="Street Address">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Phone <span>*</span></p>
								<input type="text" value="<?= $dataUser->phoneNumber; ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Email <span>*</span></p>
								<input type="email" value="<?= $dataUser->email; ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Payment System <span>*</span></p>
								<select class="form-control" id="exampleFormControlSelect1">
									<option selected>-- Option Payment --</option>
									<option>BCA</option>
									<option>OVO</option>
									<option>Gopay</option>
									<option>PayPal</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Delivery service <span>*</span></p>
								<select class="form-control" id="exampleFormControlSelect1">
									<option selected>-- Delivery Service --</option>
									<option>JNE</option>
									<option>Pos Indonesia</option>
									<option>JNT</option>
									<option>Wally West</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="checkout__order">
						<h5>Your order</h5>
						<div class="checkout__order__product">
							<ul>
								<li>
									<span class="top__text">Product</span>
									<span class="top__text__right">Total</span>
								</li>
								<?php
								$no = 1;
								foreach ($this->cart->contents() as $items): ?>
									<li>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="checkout__order__products">
													<span class="top__text mr-2"><?= $no++ ?>.</span>
													<p id="text-ellipsis"><?= $items['name']; ?></p>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="checkout__order__price">
													<p class="top__text__right">Rp. <?= number_format($items['price']) ?></p>
												</div>
											</div>
										</div>
									</li>
									<?php $subtotal = $items['price'] * $items['qty']; ?>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="checkout__order__total">
							<ul>
								<li>Total <span>Rp. <?= number_format($subtotal) ?></span></li>
							</ul>
						</div>
						<button type="submit" class="site-btn">Place oder</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<!-- Checkout Section End -->
