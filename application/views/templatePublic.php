<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Ashion Template">
	<meta name="keywords" content="Ashion, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Name Company | Motto</title>

	<!-- //? Config Css -->
	<?php require_once('pages/components/public/__css.php') ?>
</head>

<body>
<!-- //? Config Navbar -->
<?php require_once('pages/components/public/__navbar.php') ?>


<!-- //? Main Content -->
	<?php echo $contents;  ?>


	<!-- //? Footer -->
	<?php require_once('pages/components/public/__footer.php') ?>

	<!-- Search Begin -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search End -->

	<!-- //? Js Config -->
	<?php require_once('pages/components/public/__js.php') ?>
</body>

</html>
