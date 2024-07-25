<header>
	<nav class="navbar navbar-expand navbar-light navbar-top">
		<div class="container-fluid">
			<div class="simbol">
				<a href="#" class="burger-btn d-block">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</div>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-lg-0">
				</ul>
				<div class="dropdown">
					<a href="#" data-bs-toggle="dropdown" aria-expanded="false">
						<div class="user-menu d-flex">
							<div class="user-name text-end me-3">
								<h6 class="mb-0 text-gray-600"><?= $this->session->userdata('name'); ?></h6>
								<p class="mb-0 text-sm text-gray-600"><?= $this->session->userdata('level');?></p>
							</div>
							<div class="user-img d-flex align-items-center">
								<div class="avatar avatar-md">
									<img src="<?= base_url('/asset/template/mazer/') ?>assets/compiled/jpg/1.jpg">
								</div>
							</div>
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
						<li>
							<h6 class="dropdown-header">Hello, John!</h6>
						</li>
						<li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
								Profile</a></li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item log-out" href="<?= site_url('Login/logOut') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</header>

<!-- // ! Script JS -->
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
	//? Buttons Deleted
$(".log-out").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

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
