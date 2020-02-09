<div class="container-fluid">
	<h4>Invoice Pemesanan Produk</h4>

	<table class="table table-bodered table-hover table-striped">
		<tr>
			<td>ID Invoice</td>
			<td>Nama Pemesan</td>
			<td>Alamat Pengiriman</td>
			<td>Tanggal Pemesanan</td>
			<td>Batas Pembayaran</td>
			<td>Aksi</td>
		</tr>
		<?php foreach ($invoice as $inv): ?>
			<tr>
				<td><?= $inv->id ?></td>
				<td><?= $inv->nama ?></td>
				<td><?= $inv->alamat ?></td>
				<td><?= $inv->tgl_pesan ?></td>
				<td><?= $inv->batas_bayar ?></td>
				<td><?= anchor('admin/Invoice/detail/'. $inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
			</tr>
		<?php endforeach ?>
	</table>
</div>