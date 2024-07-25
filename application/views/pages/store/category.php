<!-- Title Page Content -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= site_url('store/Category') ?>"><?= $titlePage ?></a></li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Title Page Content -->

<!-- Content -->

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

	#btnOne {
		margin-right: 10px;
	}
</style>

<!-- //? Form Input Image and Name Category -->
<div class="col-md-4 col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Input Category Product</h4>
		</div>
		<?php $attributes = array('id' => 'inputFormCategory'); ?>
		<?= form_open_multipart('store/Category/plusCategory', $attributes) ?>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="nameCategory">Name Category : </label>
						<input type="text" class="form-control mt-2" id="nameCategory" name="nameCategory"
							placeholder="Enter Name Category">
					</div>
					<div class="form-group mt-2">
						<label>Image Category : </label>
						<!-- File uploader with image preview -->
						<input type="file" class="image-preview-filepond mt-2" id="imageCategory" name="imageCategory">
						<span class="required-field">The maximum image size is <span id="text">3 MB</span> and it has a <span
								id="text">4:3</span> aspect ratio</span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 d-flex justify-content-end mt-2">
				<button type="reset" class="btn btn-light-secondary me-1 mb-1" fdprocessedid="ovs8sr">Reset</button>
				<button type="submit" class="btn btn-primary me-1 mb-1" fdprocessedid="z2sjh">Save Data</button>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>
<!-- //? End Form Input Image and Name Category -->

<!-- Basic Gallery -->
<div class="divider">
	<div class="divider-text">Category Product </div>
</div>
<section id="content-types">
	<div class="row">
		<?php foreach ($displayDataCategory as $ddc): ?>
			<div class="col-xl-3 col-md-6 col-sm-12">
				<div class="card">
					<div class="card-content">
						<div class="card-body">
							<h5 class="card-title" id="nameCategory"><?= $ddc['categoryName'] ?></h5>
						</div>
						<img class="img-fluid w-100"
							src="<?= base_url('/asset/components/image/category/' . $ddc['imageCategory']) ?>" alt="Card image cap">
					</div>
					<div class="card-footer d-flex justify-content-end">
						<!-- Button trigger modal -->
						<button id="btnOne" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $ddc['idCategory'] ?>">Update</button>
						<button class="btn btn-light-danger" onclick="deleted('<?= $ddc['imageCategory'] ?>')">Deleted</button>
					</div>
				</div>
			</div>
			<!-- //? Modal Update Category -->
			<div class="modal fade" id="exampleModal<?= $ddc['idCategory'] ?>" tabindex="-1"
				aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<?php $arrayName = array('id' => 'updateDataCategory'); ?>
						<?php echo form_open_multipart('store/Category/updateCategory', $arrayName) ?>
						<input type="hidden" name="idCategory" value="<?= $ddc['idCategory'] ?>">
						<input type="hidden" name="imageCategory" value="<?= $ddc['imageCategory'] ?>">
							<div class="modal-body">
								<div class="form-group">
									<label for="nameCategory">Name Category : </label>
									<input type="text" class="form-control mt-2" id="nameCategory" name="nameCategory"
										value="<?= $ddc['categoryName'] ?>">
								</div>
								<div class="form-group mt-2">
									<div class="mb-3">
										<label for="imageInput" class="form-label">Upload Image : </label>
										<input class="form-control" name="imageCategoryUpdate" value="<?= $ddc['imageCategory'] ?>" type="file"
											id="imageInput" accept=".jpg,.jpeg,.png">
									</div>
									<div class="mb-3">
										<img id="imagePreview"
											src="<?= base_url('/asset/components/image/category/' . $ddc['imageCategory']) ?>" alt="Image Preview"
											class="img-fluid" style="max-width: 300px;" />
									</div>
									<span class="required-field">The maximum image size is <span id="text">3 MB</span> and it has a <span
											id="text">4:3</span> aspect ratio</span>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Update Data</button>
							</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
<!-- Basic Card types section end -->

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
	$('#exampleModalLabel').text("Update Category Product");

	var urlDeletedCategory = "<?php echo base_url('store/Category/deletedCategory') ?>";

	function deleted(name) {
		Swal.fire({
			title: '<strong>Delete</strong>',
			html: `Are you sure you want to delete the <span id="text">Category</span> data with the name : <span id="text">${name}</span> ?`,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Delete',
			cancelButtonText: 'Cancel'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "post",
					url: urlDeletedCategory, // Pastikan urlDeletedUser mengarah ke deleteCategory
					data: { name: name },
					dataType: "json",
					success: function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Confirmation',
								text: response.success
							}).then(() => {
								// Muat ulang halaman setelah berhasil dihapus
								location.reload();
							});
						} else if (response.error) {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: response.error
							});
						}
					}
				});
			}
		});
	}

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

</script>
