<div class="container-fluid">
	<h3><i class="fas fa-edit"></i> Edit Kategori</h3>

	<?php foreach ($kategori as $k): ?>
	<form method="post" action="<?= base_url() ?>admin/Kategori/update">
			<input type="hidden" name="id" value="<?= $k['id'] ?>">
        		<div class="form-group">
        		<label for="nama_barang">Nama Kategori</label>
        		<input type="text" name="kategori" class="form-control" id="nama_barang" value="<?= $k['kategori'] ?>">
        	</div>
        	<button type="submit" class="btn btn-primary float-right mb-4">Edit Barang</button>
	</form>
	<?php endforeach ?>
</div>