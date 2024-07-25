<!-- //! Navbar phone -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
	<div class="offcanvas__close">+</div>
	<ul class="offcanvas__widget">
		<li><span class="icon_search search-switch"></span></li>
		<li><a id="a" href="#"><span class="icon_heart_alt"></span>
				<div class="tip">2</div>
			</a></li>
		<li><a id="a" href="#"><span class="icon_bag_alt"></span>
				<div class="tip"><?php echo $this->cart->total_items(); ?></div>
			</a></li>
	</ul>
	<div class="offcanvas__logo">
		<a id="a" href="./index.html"><img src="<?= base_url('/asset/template/ashion-master/img/logo.png') ?>" alt=""></a>
	</div>
	<div id="mobile-menu-wrap"></div>
	<div class="offcanvas__auth">
		<a id="a" href="#">Login</a>
		<a id="a" href="#">Register</a>
	</div>
</div>
<!-- Offcanvas Menu End -->

<!-- //! Navbar desktop -->
<header class="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-3 col-lg-2">
				<div class="header__logo">
					<a id="a" href="./index.html"><img src="<?= base_url('/asset/template/ashion-master/img/logo.png') ?>" alt=""></a>
				</div>
			</div>
			<div class="col-xl-6 col-lg-7">
				<nav class="header__menu">
					<ul>
						<li class="active"><a id="a" href="<?= site_url('Index') ?>">Home</a></li>
						<li><a id="a" href="#">Women’s</a></li>
						<li><a id="a" href="#">Men’s</a></li>
						<li><a id="a" href="./shop.html">Shop</a></li>
						<li><a id="a" href="./blog.html">Blog</a></li>
						<?php if($this->session->userdata('idUser')) : ?>
							<li><a id="a" href="#">About Me</a>
								<ul class="dropdown">
										<li><a id="a" href="<?= site_url('About/profile/'.$this->session->userdata('idUser')) ?>">My Account</a></li>
									<li><a id="a" href="./shop-cart.html">Shop Cart</a></li>
									<li class="log-out"><a id="a">Log Out</a></li>
									<?php if ($this->session->userdata('level') == 'customer') : ?>
									<?php elseif ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'store') : ?>
										<li><a id="a" href="<?= site_url('admin/Dashboard') ?>">Page Admin</a></li>
									<?php endif; ?>
									</ul>
							</li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
			<div class="col-lg-3">
				<div class="header__right">
					<div class="header__right__auth">
						<a id="a" href="<?= site_url('Login') ?>">Login</a>
						<a id="a" href="<?= site_url('Login/registration') ?>">Register</a>
					</div>
					<ul class="header__right__widget">
						<li><span class="icon_search search-switch"></span></li>
						<li><a id="a" href="#"><span class="icon_heart_alt"></span>
								<div class="tip">2</div>
							</a></li>
						<li>
							<a id="a" href="<?= site_url('Index/viewCart') ?>"><span class="icon_bag_alt"></span>
								<div class="tip"><span id="cart-total"><?php echo $this->cart->total_items(); ?></span></div>
							</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="canvas__open">
			<i class="fa fa-bars"></i>
		</div>
	</div>
</header>
<!-- Header Section End -->

<!-- // ! Script JS -->
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
	//? Buttons Deleted
$(".log-out").on("click", function (e) {
	e.preventDefault();
	const href = "<?= site_url('Login/logOut') ?>";

	Swal.fire({
		title: "Are you sure ?",
		text: "Are you sure you want to log out?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, Log out!",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
</script>
