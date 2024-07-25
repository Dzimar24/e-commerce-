<!-- Note File Old User -->
<!-- Title -->
<div class="col-lg-12 text-center mt-5">
	<div class="related__title">
		<h5><?= $titlePage ?></h5>
	</div>
</div>

<div class="col-sm-12 col-md-6">

</div>

<!-- Table -->
<div class="container">
	<div class="m-10">
		<div class="container d-flex justify-content-end">
			<div class="col-md-10">
			</div>
			<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#ok">
				<?= $titlePage ?>
			</button>
		</div>
		<div class="card">
			<div class="card-body">
				<table id="table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Level</th>
							<th class="col-1">Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- //! Modal -->
<div class="modal fade" id="ok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php $attributes = array('id' => 'formInput'); ?>
			<?= form_open('User/userPlus', $attributes) ?>
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-md-8">
							<label for="name">Name : </label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name">
							<div class="invalid-feedback">
								<p class="text-danger" id="name_error"></p>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="level">Level Account</label>
							<select id="level" name="level" class="form-control">
								<option selected>-- Option --</option>
								<option>Admin</option>
								<option>Customer</option>
							</select>
							<div class="invalid-feedback">
								<p class="text-danger" id="level_error"></p>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="phoneNumber">Phone Number : </label>
							<input type="tel" name="phoneNumber" class="form-control" id="phoneNumber"
								placeholder="Enter Your Phone Number">
						</div>
						<div class="form-group col-md-6">
							<label for="email">Email : </label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
						</div>
					</div>
					<div class="form-group">
						<label for="password">Password : </label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password"
						>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save data</button>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<div class="viewModal" style="display: none;"></div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- //?	JS Config User Page -->
<script>

	(function () {
		'use strict';
		window.addEventListener('load', function () {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function (form) {
				form.addEventListener('submit', function (event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();


	function viewsData() {
		table = $('#table').DataTable({
			responsive: true,
			"destroy": true,
			"processing": true,
			"serverSide": true,
			"order": [],

			"ajax": {
				"url": "<?= site_url('User/getData') ?>",
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

				//? Validation level 
				if (!$('#level').val()) {
					$('#level').addClass('is-invalid');
					$('#level_error').html('');
				} else {
					$('#level').removeClass('is-invalid');
					$('#level').addClass('is-valid');
					$('#level_error').html('');
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
						$('#ok').modal('hide'); // Tutup modal jika berhasil
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});

			return false;
		});
	});

	$('.modal-footer button[type="submit"]').removeAttr('data-bs-dismiss');
</script>

