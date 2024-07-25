<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="<?= site_url('Index') ?>"><i class="fa fa-home"></i> Home</a>
					<span>Shopping cart</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<style>
	.cart__product__item {
		display: flex;
		align-items: center;
	}

	.containerImage {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100px;
		/* atau ukuran lain yang diinginkan */
		height: 100px;
		/* pastikan sama dengan lebar untuk rasio 1:1 */
		overflow: hidden;
		/* memotong bagian gambar yang keluar dari kontainer */
		margin-right: 10px;
		/* jarak antara gambar dan teks */
	}

	.square-img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		/* menjaga gambar tetap sesuai dengan kotak, memotong jika perlu */
	}

	#text-ellipsis {
		width: 400px;
		/* Sesuaikan dengan lebar elemen Anda */
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		position: relative;
		/* Atau absolute jika diperlukan, tergantung pada konteks */
	}

	.cart__product__item__title {
		width: 420px;
		/* Sesuaikan dengan lebar elemen Anda */
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.check {
		margin-right: 30px;
	}

	.left-aligned-button {
		float: right;
	}

	.tar {
		font-size: 14px;
		color: #111111;
		font-weight: 600;
		text-transform: uppercase;
		display: inline-block;
		padding: 14px 30px 12px;
		background: #f5f5f5;
		background-color: #C80036;
		/* Warna abu-abu */
		border: none;
		/* Tanpa border */
		border-radius: 5px;
		/* Memperhalus sudut tombol */
		cursor: pointer;
		/* Mengubah kursor menjadi tanda penunjuk saat diarahkan ke tombol */
		text-decoration: none;
		/* Tidak ada dekorasi teks */
		display: inline-block;
		/* Menjadikan tombol sebagai elemen inline-block */
	}
</style>

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<php class="shop__cart__table">
					<table>
						<thead>
							<tr>
								<th><input type="checkbox" name="chck[]" id="" onchange="checkAll(this)"></th>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($this->cart->contents() as $items): ?>
								<tr>
									<td><input type="checkbox" name="opo[]" id="" class="check checkboxes" value="<?= $items['qty'] ?>">
									</td>
									<td class="cart__product__item">
										<div class="containerImage">
											<img src="<?= base_url('/asset/components/image/product/' . $items['image']) ?>" class="square-img">
										</div>
										<div class="cart__product__item__title">
											<h6 id="text-ellipsis"><?= $items['name'] ?></h6>
										</div>
									</td>
									<td class="cart__price">Rp. <?= number_format($items['price']) ?></td>
									<td class="cart__quantity">
										<div class="pro-qty">
											<input type="text" id="numberInput" value="<?= $items['qty'] ?>">
										</div>
									</td>
									<?php $subtotal = $items['price'] * $items['qty']; ?>
									<td class="cart__total">Rp. <?= number_format($items['subtotal']) ?></td>
									<td class="cart__close"><a href="<?= site_url('Index/delete/' . $items['rowid']) ?>"><span
												class="icon_close"></span></a></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</php>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="cart__btn">
					<a href="<?= site_url('Index') ?>">Back to Shopping</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
			</div>
			<div class="col-lg-4 offset-lg-2">
				<div class="cart__total__procced">
					<h6>Cart total</h6>
					<ul>
						<li>Total <span>Rp. <?= number_format($this->cart->total()) ?></span></li>
					</ul>
					<a id="a" href="<?= site_url('Index/checkout/'.$this->session->userdata('idUser')) ?>" class="primary-btn">Proceed to checkout</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Shop Cart Section End -->

<!-- JQuery -->
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
	$(document).ready(function () {
		$("#numberInput").keypress(function (e) {
			if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
		});
	});

	function checkAll(ele) {
		var checkboxes = document.getElementsByClassName('checkboxes');
		if (ele.checked) {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i]) {
					checkboxes[i].checked = true;
				}
			}
		} else {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i]) {
					checkboxes[i].checked = false;
				}
			}
		}
	}

</script>
