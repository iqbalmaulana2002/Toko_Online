<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
<?= $this->session->flashdata('pesan') ?>
	<table class="table table-bordered">
		<tr align="center">
			<th>No</th>
			<th>Nama Barang</th>
			<th>Keterangan</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Aksi</th>
		</tr>
		<?php $no=1;
		 foreach ($barang as $brg): ?>
			<tr align="center">
  				<td><?= $no++ ?></td>
  				<td><?= $brg['nama_barang'] ?></td>
  				<td><?= $brg['keterangan'] ?></td>
<?php foreach ($kategori as $k) {
         if ($k['id'] == $brg['id_kategori']) { ?>
          <td><?= $k['kategori'] ?></td>
      <?php }
  }
 ?>
  				<td>Rp. <?= number_format($brg['harga'], 0, ',', '.') ?></td>
  				<td><?= $brg['stok'] ?></td>
  				<td>
            <?= anchor('admin/Data_barang/detail_barang_admin/'. $brg['id_barang'], '<div class="btn btn-primary btn-sm"><i class="fas fa-search-plus"></i> <strong>Detail</strong></div>') ?>
            <?= anchor('admin/Data_barang/edit/'. $brg['id_barang'], '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i> <strong>Edit</strong></div>') ?>
            <?= anchor('admin/Data_barang/hapus/'. $brg['id_barang'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <strong>Hapus</strong></div>') ?>
  				</td>
			</tr>
		<?php endforeach ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>admin/Data_barang/tambah_barang" method="post" enctype="multipart/form-data">
        	
        	<div class="form-group">
        		<label for="nama_barang">Nama Barang</label>
        		<input type="text" name="nama_barang" class="form-control" id="nama_barang">
        	</div>

        	<div class="form-group">
        		<label for="keterangan">Keterangan</label>
        		<input type="text" name="keterangan" class="form-control" id="keterangan">
        	</div>

        	<div class="form-group">
        		<label for="kategori">Kategori</label>
        		<select name="kategori" class="form-control" id="kategori">
              <option selected>-- Pilih Kategori --</option>
          <?php $sql = $this->db->get('tb_kategori')->result();
            foreach($sql as $row): ?>
              <option value="<?= $row->id ?>"><?= $row->kategori ?></option>
      <?php endforeach ?>
            </select>
        	</div>

        	<div class="form-group">
        		<label for="harga">Harga</label>
        		<input type="text" name="harga" class="form-control" id="harga">
        	</div>

        	<div class="form-group">
        		<label for="stok">Stok</label>
        		<input type="text" name="stok" class="form-control" id="stok">
        	</div>

        	<div class="form-group">
        		<label for="gambar">Gambar Produk</label><br>
        		<input type="file" name="gambar" id="gambar">
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