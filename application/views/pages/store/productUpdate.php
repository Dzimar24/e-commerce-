<!-- Title Page Content -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= site_url('store/Product') ?>"><?= $titlePage ?></a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= $secondPage ?></li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Title Page Content -->

<style>
	.required-field::before {
		content: '*';
		color: red;
		margin-right: 5px;
	}

	#text {
		color: #a4133c;
		font-weight: bold;
	}

	#imageSection {
		margin-right: 50px;
	}

	#btnOne {
		margin-right: 10px;
	}
</style>

<!-- Form -->
<div class="col-md-8 col-11">
	<section class="section">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Input Product</h4>
			</div>
			<div class="card-body">
				<?php echo form_open_multipart('store/Product/updateProduct') ?>
				<input type="hidden" name="idProduct" value="<?= $selectDataProductById->idProduct ?>">
				<input type="hidden" name="idUser" value="<?= $selectDataProductById->idUser ?>">
				<input type="hidden" name="imageCategory" value="<?= $selectDataProductById->image ?>">
				<div class="row">
					<div class="col-md-5" id="imageSection">
						<div class="form-group">
							<label>Image Product : </label>
							<!-- File uploader with image preview -->
							<input class="form-control" name="imageProduct" value="<?= $selectDataProductById->image ?>" type="file"
								id="imageInput" accept=".jpg,.jpeg,.png">
							<div class="mt-2">
								<img id="imagePreview"
									src="<?= base_url('/asset/components/image/product/' . $selectDataProductById->image) ?>"
									alt="Image Preview" class="img-fluid" style="max-width: 300px;" />
							</div>
							<span class="required-field">The maximum image size is <span id="text">3 MB</span> and it has a <span
									id="text">4:3</span> aspect ratio</span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="productName">Name Product :</label>
							<input type="text" name="name" value="<?= $selectDataProductById->name ?>" class="form-control mt-1"
								id="productName">
						</div>
						<div class="row">
							<div class="col-md-5">
								<label for="price">Price Product : </label>
								<div class="input-group mt-1">
									<input type="text" name="price" class="form-control" value="<?= $selectDataProductById->price ?>"
										id="priceInput">
									<div id="notification" class="alert alert-danger mt-2" style="display: none;"></div>
								</div>
							</div>
							<div class="col-md-3">
								<label for="stock">Stock :</label>
								<input type="text" name="stock" class="form-control mt-1" value="<?= $selectDataProductById->stock ?>"
									id="stock">
							</div>
							<div class="col-md-4">
								<label for="category">Category :</label>
								<select id="category" name="idCategory" class="form-select mt-1">
									<?php foreach ($selectDatabaseCategory as $sdc): ?>
										<option <?php if ($sdc['idCategory'] == $sdc['idCategory']) {
											echo "selected";
										} ?>
											value="<?= $sdc['idCategory'] ?>">
											<?= $sdc['categoryName'] ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="card-body">
							<textarea name="description" id="default" cols="30"
								rows="10"><?= $selectDataProductById->description ?></textarea>
						</div>
						<div class="container d-flex justify-content-end">
							<div class="col-md-8">
							</div>
							<a id="btnOne" href="<?= site_url('store/Product/product/' . $selectDataProductById->idUser) ?>"
								type="reset" class="btn btn-secondary">Back</a>
							<button type="submit" class="btn btn-primary">Save Data</button>
						</div>
					</div>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</section>
</div>
<!-- End Form -->

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

<script>
	$(document).ready(function () {
		$("#stock").keypress(function (e) {
			if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
		});
	});

	//TODO: Image Preview
	document.getElementById('imageInput').addEventListener('change', function (event) {
		const file = event.target.files[0];
		if (file) {
			const reader = new FileReader();
			reader.onload = function (e) {
				const img = document.getElementById('imagePreview');
				img.src = e.target.result;
				img.style.display = 'block';
			};
			reader.readAsDataURL(file);
		}
	});

	document.addEventListener('DOMContentLoaded', function () {
		const priceInput = document.getElementById('priceInput');
		const notification = document.getElementById('notification');

		// Function to format the price input
		function formatPriceInput() {
			let priceValue = priceInput.value.replace(/[^0-9]/g, '');
			if (priceValue) {
				let formattedPrice = new Intl.NumberFormat("id-ID", {
					style: "currency",
					currency: "IDR",
					maximumFractionDigits: 0
				}).format(priceValue);

				// Set the formatted price back to the input field
				priceInput.value = formattedPrice;
			}
		}

		// Ensure the price input is formatted on page load
		formatPriceInput();

		// Event listener for keydown
		priceInput.addEventListener('keydown', function (event) {
			// Allow: backspace, delete, tab, escape, enter, and '.'
			if ([46, 8, 9, 27, 13, 110].indexOf(event.keyCode) !== -1 ||
				// Allow: Ctrl/cmd+A
				(event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) ||
				// Allow: Ctrl/cmd+C
				(event.keyCode === 67 && (event.ctrlKey === true || event.metaKey === true)) ||
				// Allow: Ctrl/cmd+X
				(event.keyCode === 88 && (event.ctrlKey === true || event.metaKey === true)) ||
				// Allow: home, end, left, right
				(event.keyCode >= 35 && event.keyCode <= 39)) {
				// let it happen, don't do anything
				return;
			}
			// Ensure that it is a number and stop the keypress
			if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
				event.preventDefault();
				notification.textContent = "Please enter only numbers.";
				notification.style.display = "block";

				// Hide the notification after 3 seconds
				setTimeout(function () {
					notification.style.display = "none";
				}, 3000);
			}
		});

		// Event listener for input
		priceInput.addEventListener('input', function () {
			// Ensure the input contains only numbers
			priceInput.value = priceInput.value.replace(/[^0-9]/g, '');
			// Format the input value
			formatPriceInput();
		});
	});



</script>
