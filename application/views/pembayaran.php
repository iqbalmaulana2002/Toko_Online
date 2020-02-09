<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php 
					$grand_total = 0;
					if ($keranjang = $this->cart->contents()) {
						foreach ($keranjang as $item) {
							$grand_total = $grand_total + $item['subtotal'];
						}
					echo "Total Belanja Anda : Rp. ". number_format($grand_total, 0, ',', '.');
				 ?>
			</div><br><br>

			<h3>Input Alamat Pengiriman dan Pembayaran</h3>
			<form method="post" action="<?= base_url() ?>Dashboard/proses_pesanan">
				<div class="form-group">
        			<label for="nama_lengkap">Nama Lengkap</label>
        			<input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap Anda ..." value="<?= set_value('nama_lengkap') ?>">
                                <div class="small text-danger ml-3"><?= form_error('nama_lengkap'); ?></div>
        		</div>

        		<div class="form-group">
        			<label for="Alamat_lengkap">Alamat Lengkap</label>
        			<input type="text" name="alamat_lengkap" class="form-control" id="Alamat_lengkap" placeholder="Masukkan Alamat Anda ..." value="<?= set_value('alamat_lengkap') ?>">
                                <div class="small text-danger ml-3"><?= form_error('alamat_lengkap'); ?></div>
        		</div>

        		<div class="form-group">
        			<label for="no.telp">No. Telepon</label>
        			<input type="text" name="no_telp" class="form-control" id="no.telp" placeholder="Masukkan No. Telepon Anda ..." value="<?= set_value('no_telp') ?>">
                                <div class="small text-danger ml-3"><?= form_error('no_telp'); ?></div>
        		</div>

        		<div class="form-group">
        			<label for="jasa">Jasa Pengiriman</label>
        			<select name="jasa" id="jasa" class="form-control">
        				<option>JNE</option>
        				<option>TIKI</option>
        				<option>Pos Indonesia</option>
        				<option>Gojek</option>
        				<option>Grab</option>
        			</select>
        		</div>

        		<div class="form-group">
        			<label for="Bank">Pilih Bank</label>
        			<select name="Bank" id="Bank" class="form-control">
        				<option>BCA - XXXXXXX</option>
        				<option>BNI - XXXXXXX</option>
        				<option>BRI - XXXXXXX</option>
        				<option>Mandiri - XXXXXXX</option>
        			</select>
        		</div>

        		<button type="submit" class="btn btn-sm btn-primary mb-3 float-right">Pesan</button>
			</form>

			<?php 
				} else {
        				echo "
        					<script>
        						alert('Keranjang Belanja Anda Masih Kosong');
                                                        location=('index');
        					</script>
        				";
				}
			 ?>

		</div>
		<div class="col-md-2"></div>
	</div>
</div>