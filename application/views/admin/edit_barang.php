<div class="container-fluid">
	<h3><i class="fas fa-edit"></i> Edit Barang</h3>

	<?php foreach ($barang as $brg): ?>
		<form method="post" action="<?= base_url() ?>admin/Data_barang/update">
			<input type="hidden" name="id_barang" value="<?= $brg['id_barang'] ?>">
			<div class="form-group">
        		<label for="nama_barang">Nama Barang</label>
        		<input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $brg['nama_barang'] ?>">
        	</div>

        	<div class="form-group">
        		<label for="keterangan">Keterangan</label>
        		<input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $brg['keterangan'] ?>">
        	</div>

        	<div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                                <option selected>-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k): ?>
                                <?php if ($k['id'] == $brg['id_kategori']): ?>
                                        <option value="<?= $k['id'] ?>" selected><?= $k['kategori'] ?></option>
                                <?php else: ?>
                                        <option value="<?= $k['id'] ?>"><?= $k['kategori'] ?></option>
                                <?php endif ?>
                        <?php endforeach ?>
                        </select>
                </div>

        	<div class="form-group">
        		<label for="harga">Harga</label>
        		<input type="text" name="harga" class="form-control" id="harga" value="<?= $brg['harga'] ?>">
        	</div>

        	<div class="form-group">
        		<label for="stok">Stok</label>
        		<input type="text" name="stok" class="form-control" id="stok" value="<?= $brg['stok'] ?>">
        	</div>

        	<button type="submit" class="btn btn-primary float-right mb-4">Edit Barang</button>
		</form>
	<?php endforeach ?>
</div>