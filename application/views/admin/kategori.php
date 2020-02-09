<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_kategori"><i class="fas fa-plus fa-sm"></i> Tambah Kategori</button>
<?= $this->session->flashdata('pesan') ?>
	<table class="table table-bordered">
		<tr align="center">
			<th>ID</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
		<?php $no=1;
		 foreach ($kategori as $k): ?>
			<tr align="center">
				<td><?= $k['id'] ?></td>
				<td><?= $k['kategori'] ?></td>
				<td>
          <?= anchor('admin/Kategori/edit/'. $k['id'], '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i> <strong>Edit</strong></div>') ?>
          <?= anchor('admin/Kategori/hapus/'. $k['id'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <strong>Hapus</strong></div>') ?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>admin/Kategori/tambah_barang" method="post">
        	
        	<div class="form-group">
        		<label for="nama_kategori">Nama Kategori</label>
        		<input type="text" name="kategori" class="form-control" id="nama_kategori">
        	</div>

	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Batal</b></button>
	        	<button type="submit" class="btn btn-primary"><b>Simpan</b></button>
	      	</div>
  		</form>
  	  </div>
    </div>
  </div>
</div>