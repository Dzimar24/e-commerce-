<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<link rel="stylesheet" href="<?= base_url('/asset/template/style.css') ?>">
	<!-- Sweat Alert -->
	<script src="<?= base_url('/asset/template/mazer/') ?>assets/static/js/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="<?= base_url('/asset/template/mazer/') ?>assets/static/js/node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
	<div class="wrapper">
		<h2>Login</h2>
		<?php echo form_open('Login/process') ?>
			<div class="input-box"> 
				<input type="text" name="email" placeholder="Enter your email" required>
			</div>
			<div class="input-box"> 
				<input type="password" name="password" placeholder="Enter your password" required> 
			</div>
			<div class="input-box button"> <input type="Submit" value="Login Now"> </div>
			<div class="text">
				<h3>Don't have an account yet ?<a href="<?= site_url('Login/registration') ?>">Register Now</a></h3>
			</div>
		<?php echo form_close(); ?>
	</div>


	<!-- // ! Script JS -->
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
</body>


</html>
