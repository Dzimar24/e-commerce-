<!-- Title Page Content -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= site_url('admin/User') ?>"><?= $titlePage ?></a></li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Title Page Content -->

<!-- Content -->
<style>
	.dataTables_wrapper {
		width: 100%;
		overflow: hidden;
		/* Ensure no scroll bars */
	}

	/* Ensure the table fits within the container */
	table.dataTable {
		width: 100%;
	}
</style>

<!-- Button trigger modal -->
<div class="container d-flex justify-content-end">
	<div class="col-md-10">
	</div>
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
		User Add
	</button>
</div>

<section class="section mt-3">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">
				<?= $titlePage ?>
			</h5>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="myTable">
					<thead>
						<tr>
							<th class="col-1">No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th class="col-1">Level</th>
							<th class="col-2">Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!-- Basic Tables end -->

<!-- //? Modal Add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php $attributes = array('id' => 'formInput', 'data-parsley-validate' => ''); ?>
			<?= form_open('admin/User/userPlus', $attributes) ?>
			<div class="modal-body">
				<div class="row g-3">
					<div class="col-md-8">
						<div class="form-group mandatory">
							<label for="name" class="form-label">Name : </label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name"
								data-parsley-required="true">
							<div class="invalid-feedback">
								<p class="text-danger" id="name_error"></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="level" class="form-label">Level</label>
						<select id="level" name="level" class="form-select">
							<option selected>-- Option --</option>
							<option value="admin">Admin</option>
							<option value="customer">Customer</option>
							<option value="store">Store</option>
						</select>
						<div class="invalid-feedback">
							<p class="text-danger" id="level_error"></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group mandatory">
							<label for="phoneNumber" class="form-label">Phone Number :</label>
							<input type="text" name="phoneNumber" class="form-control" id="phoneNumber"
								placeholder="Enter Your Phone Number" data-parsley-required="true">
							<div class="invalid-feedback">
								<p class="text-danger" id="phoneNumber_error"></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group mandatory">
							<label for="email" class="form-label">Email : </label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email"
								data-parsley-required="true">
							<div class="invalid-feedback">
								<p class="text-danger" id="email_error"></p>
							</div>
						</div>
					</div>
					<style>
						#text {
							color: #a4133c;
							font-weight: bold;
						}
					</style>
					<div class="col-12">
						<div class="form-group mandatory">
							<label for="password" class="form-label">Password : </label>
							<input type="password" name="password" class="form-control" id="password"
								placeholder="Enter Your Password" data-parsley-required="true">
							<div class="invalid-feedback">
								<p class="text-danger" id="password_error"></p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save Data</button>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="viewModal" style="display: none;"></div>

<!-- // ! Script JS -->
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- //?	JS Config User Page -->
<script>
	function viewsData() {
		table = $('#myTable').DataTable({
			"scrollY": false, // Disable vertical scrolling
			"scrollX": false, // Disable horizontal scrolling
			"paging": true, // Enable paging
			"searching": true, // Enable searching
			"info": true, // Show table information
			"autoWidth": true,
			responsive: true,
			"destroy": true,
			"processing": true,
			"serverSide": true,
			"order": [],

			"ajax": {
				"url": "<?= site_url('admin/User/getData') ?>",
				"type": "POST"
			},


			"columnDefs": [{
				"targets": [0],
				"orderable": false,
				"width": 5
			}],

		});
	}


	$('#exampleModalLabel').text('Plus User');

	$(document).ready(function () {

		$('#formInput').parsley();

		viewsData();

		//! form Input User
		$('#formInput').submit(function (e) {

			//? Validation before form submit
			$('#formInput').find('input').each(function () {
				//? Validation Name 
				if ($('#name').val().length < 5) {
					$('#name').addClass('is-invalid');
					$('#name_error').html('');
				} else {
					$('#name').removeClass('is-invalid');
					$('#name').addClass('is-valid');
					$('#name_error').html('');
				}

				//? Validation level 
				if (!$('#level').val()) {
					$('#level').addClass('is-invalid');
					$('#level_error').html('');
				} else {
					$('#level').removeClass('is-invalid');
					$('#level').addClass('is-valid');
					$('#level_error').html('');
				}

				//? Validation Phone Number 
				if ($('#phoneNumber').val().length < 5) {
					$('#phoneNumber').addClass('is-invalid');
					$('#phoneNumber_error').html('');
				} else {
					$('#phoneNumber').removeClass('is-invalid');
					$('#phoneNumber').addClass('is-valid');
					$('#phoneNumber_error').html('');
				}

				//? Validation Email
				if ($('#email').val().length < 5) {
					$('#email').addClass('is-invalid');
					$('#email_error').html('');
				} else {
					$('#email').removeClass('is-invalid');
					$('#email').addClass('is-valid');
					$('#email_error').html('');
				}

				//? Validation Password 
				if ($('#password').val().length < 5) {
					$('#password').addClass('is-invalid');
					$('#password_error').html('');
				} else {
					$('#password').removeClass('is-invalid');
					$('#password').addClass('is-valid');
					$('#password_error').html('');
				}
			});

			//? Kirim form melalui AJAX jika validasi dinamis selesai
			$.ajax({
				type: "POST",
				url: $(this).attr('action'),
				data: $(this).serialize(),
				dataType: "JSON",
				success: function (response) {
					if (response.error) {
						$.each(response.error, function (field, message) {
							$('#' + field + '_error').html(message);
						});
					}
					/** 
					 * 
						else {
							$('#ok').modal('hide'); // Tutup modal jika berhasil
						}
					*/

					if (response.success) {
						Swal.fire({
							icon: "success",
							title: "Success Add Data",
							text: response.success,
						});
						viewsData();
						$('#add').modal('hide'); // Tutup modal jika berhasil
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});

			return false;
		});

		$("#phoneNumber").keypress(function (e) {
			if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
		});
	});

	$('.modal-footer button[type="submit"]').removeAttr('data-bs-dismiss');

	var urlUpdate = "<?php echo base_url('admin/User/modalUpdate') ?>"
	var urlDeletedUser = "<?php echo base_url('admin/User/deletedUser') ?>"
	var urlResetPassword = "<?php echo base_url('admin/User/resetPassword') ?>"

	//? Featured Model Update
	function update(name) {
		$.ajax({
			type: "POST",
			url: urlUpdate,
			data: {
				name: name
			},
			dataType: "JSON",
			success: function (response) {
				$('.viewModal').html(response.success).show();
				$('#update').on('shown.bs.modal', function (e) {
					$('#name').focus();
				})
				$('#update').modal('show');
			}
		});
	}

	//? Function Deleted
	function deleted(name) {
		Swal.fire({
			title: '<strong>Delete</strong>',
			text: `Are you sure you want to Delete the user data with the Name : ${name} ?`,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Delete',
			cancelButtonText: 'Cancel'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "post",
					url: urlDeletedUser,
					data: {
						name: name,
					},
					dataType: "json",
					success: function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Confirmation',
								text: response.success
							});
							viewsData();
						}
					}
				});
			}
		})
	}

	//? Featured Reset Password
	function resetPassword(name) {
		Swal.fire({
			title: '<b>Reset Password</b>',
			text: `Are you sure you want to reset the password for name : ${name} ?`,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Reset Password',
			cancelButtonText: 'Cancel'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "post",
					url: urlResetPassword,
					data: {
						name: name,
					},
					dataType: "JSON",
					success: function (response) {
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Confirmation',
								text: response.success
							});
							viewsData();
						}
					}
				});
			}
		})
	}
</script>
