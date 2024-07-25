<!-- Title Page Content -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= site_url('store/Product') ?>"><?= $titlePage ?></a></li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Title Page Content -->

<!-- Content -->

<!-- //? Button Add -->
<div class="container d-flex justify-content-end">
	<div class="col-md-10">
	</div>
	<a class="btn btn-primary" href="<?= site_url('store/Product/viewAddProduct') ?>">Product Add</a>
</div>
<!-- //? End Button Add -->

<div class="divider">
	<div class="divider-text">Product </div>
</div>

<style>
	#elements {
		border-top-left-radius: 20px;
		border-top-right-radius: 20px;
	}

	#text-ellipsis {
		width: 280px;
		/* Sesuaikan dengan lebar elemen Anda */
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	#p {
		margin-top: 20px;
		margin-left: auto;
    margin-right: auto;
    width: 7em;
		color: #a4133c;
		font-weight: bold;
	}

	#i{
		margin-right: 10px;
	}

	.deleted{
		color: red;
	}
</style>

<?php if ($selectDataProduct): ?>
	<section id="content-types">
		<div class="row">
			<?php foreach ($selectDataProduct as $sdp): ?>
				<div class="col-xl-4 col-md-6 col-sm-12">
					<div class="card" style="border-radius: 30px;">
						<div class="card-content">
							<img class="img-fluid w-100" id="elements" src="<?= base_url('/asset/components/image/product/' . $sdp->image) ?>" alt="Card image cap">
						</div>
						<div class="card-footer d-flex justify-content-between">
							<span id="text-ellipsis"><?= $sdp->name; ?></span>
							<button class="btn btn-light-primary" data-bs-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false"><i class="bi bi-gear"></i></button>
							<div class="dropdown-menu">
								<h6 class="dropdown-header">Settings</h6>
								<input type="hidden" name="idUser" value="<?= $sdp->idUser ?>" >
								<a class="dropdown-item" href="<?= site_url('store/Product/deletedProduct/'. $sdp->image) ?>"><span class="deleted"><i id="i" class="bi bi-trash3"></i>Deleted</span></a>
								<a class="dropdown-item" href="<?= site_url('store/Product/viewUpdateProduct/'. $sdp->idProduct) ?>"><i id="i" class="bi bi-pencil"></i>Update</a>
								<a class="dropdown-item" href="<?= site_url('store/Product/viewsData/'. $sdp->idProduct) ?>"><i id="i" class="bi bi-eye"></i>Views</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>
<?php else: ?>
	<p id="p">No products</p>
<?php endif; ?>
<!-- Basic Card types section end -->
<!-- End Content -->

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
		confirmButtonText: "Yes, Delete !",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
</script>
