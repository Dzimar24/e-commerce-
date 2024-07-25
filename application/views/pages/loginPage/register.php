<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Page</title>
	<link rel="stylesheet" href="<?= base_url('/asset/template/style.css') ?>">
	<!-- Sweat Alert -->
	<script src="<?= base_url('/asset/template/mazer/') ?>assets/static/js/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="<?= base_url('/asset/template/mazer/') ?>assets/static/js/node_modules/sweetalert2/dist/sweetalert2.min.css">

</head>

<body>
	<div class="wrapper">
		<h2>Registration</h2>
		<?php echo form_open('Login/addUser') ?>
		<div class="input-box">
			<input type="text" name="name" placeholder="Enter your name" required>
		</div>
		<div class="input-box">
			<input type="text" name="email" placeholder="Enter your email" required>
		</div>
		<div class="input-box">
			<input type="number" name="phoneNumber" placeholder="Enter your phone number" required>
		</div>
		<div class="input-box">
			<input type="password" name="password" placeholder="Create password" required>
		</div>
		<div class="input-box button">
			<input type="Submit" value="Register Now">
		</div>
		<div class="text">
			<h3>Already have an account? <a href="<?= site_url('Login') ?>">Login now</a></h3>
		</div>
		<?php echo form_close(); ?>
	</div>
	<!-- // ! Script JS -->
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<!-- //?	JS Config Category Page -->
	<?php if ($this->session->flashdata('success')): ?>
		<script>
			Swal.fire({
				icon: "success",
				title: "Success Add Data",
				text: "<?= $this->session->flashdata('success'); ?>",
			});
		</script>
	<?php endif; ?>
</body>

</html>
