<div class="container-fluid">
	<div class="card">
	  <strong><div class="card-header">Detail Produk</div></strong>
	  <div class="card-body">
	  	<?php foreach ($barang as $brg): ?>
	  	<div class="row">
	  		<div class="col-md-4">
	  			<img src="<?= base_url('/uploads/'.$brg->gambar) ?>" class="card-img-top">		
	  		</div>	
	  		<div class="col-md-8">
	  			<table class="table">
	  				<tr>
	  					<td>Nama Produk</td>
	  					<td><strong><?= $brg->nama_barang ?></strong></td>
	  				</tr>
	  				<tr>
	  					<td>Keterangan</td>
	  					<td><strong><?= $brg->keterangan ?></strong></td>
	  				</tr>
	  				<tr>
	  					<td>Kategori</td>
  		<?php foreach ($kategori as $k) {
  					 if ($k->id == $brg->id_kategori) { ?>
  						<td><strong><?= $k->kategori ?></strong></td>
		  		<?php }
			}
		 ?>
	  				</tr>
	  				<tr>
	  					<td>Stok</td>
	  					<td><strong><?= $brg->stok ?></strong></td>
	  				</tr>
	  				<tr>
	  					<td>Harga</td>
	  					<td><strong><div class="badge badge-success">Rp. <?= number_format($brg->harga, 0, ',', '.') ?></div></strong></td>
	  				</tr>
	  			</table>

	  			<?= anchor('admin/Data_barang/index', '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
	  			
	  		</div>
	  	</div>
	  	<?php endforeach ?>
	  </div>
	</div>
</div>