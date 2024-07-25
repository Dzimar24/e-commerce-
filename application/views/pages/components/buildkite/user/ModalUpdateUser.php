<!-- //? Modal Add -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php $attributes = array('id' => 'formUpdate', 'data-parsley-validate' => ''); ?>
			<?= form_open('admin/User/userUpdate', $attributes) ?>
			<div class="modal-body">
				<div class="row g-3">
					<div class="col-md-8">
						<input type="hidden" value="<?= $idUser ?>" name="idUser">
						<div class="form-group mandatory">
							<label for="name" class="form-label">Name : </label>
							<input type="text" name="name" value="<?= $name ?>" class="form-control" id="name" placeholder="Enter Your Name"
								data-parsley-required="true">
							<div class="invalid-feedback">
								<p class="text-danger" id="name_error"></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="level" class="form-label">Level</label>
						<select id="level" name="level" class="form-select">
							<option value="admin" <?php if ($level == 'admin') echo 'selected'; ?>>Admin</option>
							<option value="customer" <?php if ($level == 'customer') echo 'selected'; ?>>Customer</option>
							<option value="store" <?php if ($level == 'store') echo 'selected'; ?>>Store</option>
						</select>
						<p class="text-danger" id="level_error"></p>
					</div>
					<div class="col-md-6">
						<div class="form-group mandatory">
							<label for="phoneNumber" class="form-label">Phone Number :</label>
							<input type="tel" name="phoneNumber" value="<?= $phoneNumber ?>" class="form-control" id="phoneNumber"
								placeholder="Enter Your Phone Number" data-parsley-required="true">
							<div class="invalid-feedback">
								<p class="text-danger" id="phoneNumber_error"></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group mandatory">
							<label for="email" class="form-label">Email : </label>
							<input type="email" name="email"  value="<?= $email ?>" class="form-control" id="email" placeholder="Enter Your Email"
								data-parsley-required="true">
							<div class="invalid-feedback">
								<p class="text-danger" id="email_error"></p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save Data</button>
					</div>
				</div>
			</div>
			<?php form_close(); ?>
		</div>
	</div>
</div>

<!-- Script JQuery -->
<script>
	$('#exampleModalLabel').text('Update User');

	$(document).ready(function () {
		//! form Update User
		$('#formUpdate').submit(function (e) {
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
							title: "Success Update Data",
							text: response.success,
						});
						$('#update').modal('hide');
						viewsData();
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});

			return false;
		});
	});
</script>
