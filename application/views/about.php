<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.html"><i class="fa fa-home"></i> Home</a>
					<span><?= $sectionPage ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad mr-9">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h6 class="coupon__link" style="font-weight: bold;"><i class="fa-solid fa-circle-radiation" style="color: red;"></i> Take control of your account by managing your profile information. Protect and secure your account with these options.</h6>
			</div>
		</div>
		<form action="#" class="checkout__form">
			<div class="row">
				<div class="col-lg-8">
					<h5>About Me</h5>
					<div class="row">
						<div class="col-lg-12">
							<div class="checkout__form__input">
								<p>Name <span>*</span></p>
								<input type="text" value="<?php echo $user->name; ?>" readonly>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Phone Number <span>*</span></p>
								<input type="text" value="<?php echo $user->phoneNumber; ?>" readonly >
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Email <span>*</span></p>
								<input type="text" value="<?php echo $user->email; ?>" readonly >
							</div>
						</div>
						<div class="col-lg-12">
							<!-- //? this input update Password account -->
							<!-- <div class="checkout__form__input">
								<p>Account Password <span>*</span></p>
								<input type="text">
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<!-- Checkout Section End -->
