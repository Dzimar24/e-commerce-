<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Name Company | Motto</title>

	<!-- //? Config File Css Admin Page -->
	<?php require_once ('pages/components/admin/__css.php') ?>
</head>

<body>
	<script src="<?= base_url('/asset/template/mazer/assets/static/js/initTheme.js') ?>"></script>
	<div id="app">
		<!-- //? Config Side Bar Page Admin -->
		<?php include_once ('pages/components/admin/___sidebar.php') ?>

		<div id="main" class='layout-navbar navbar-fixed'>

			<!-- //? Config Navbar Page Admin -->
			<?php require_once ('pages/components/admin/___navbar.php') ?>

			<!-- //? Main Content -->
			<div id="main-content">

				<?= $contents; ?>

			</div>

			<!-- //? Config Footer Page Admin -->
			<?php include_once ('pages/components/admin/___footer.php') ?>

		</div>
	</div>

	<!-- //? Config Js File Page Admin -->
	<?php require_once ('pages/components/admin/__js.php') ?>


</body>

</html>
