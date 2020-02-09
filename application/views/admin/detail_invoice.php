<div class="container-fluid">
	<h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice : <?= $invoice->id ?></div></h4>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Jumlah Pesanan</th>
			<th>Harga Satuan</th>
			<th>Sub Total</th>
		</tr>

		<?php $total = 0;
			foreach ($pesanan as $psn) :
				$sub_total = $psn->jumlah * $psn->harga;
				$total += $sub_total; ?>
		<tr>
			<td><?= $psn->id_barang ?></td>
			<td><?= $psn->nama_barang ?></td>
			<td><?= $psn->jumlah ?></td>
			<td><?= number_format($psn->harga, 0, ',', '.') ?></td>
			<td><?= number_format($sub_total, 0, ',', '.') ?></td>
		</tr>

		<?php endforeach ?>

		<tr>
			<td colspan="4" align="right">Total Pembayaran</td>
			<td align="right"><?= number_format($total, 0, ',', '.') ?></td>
		</tr>
	</table>

	<a href="<?= base_url('admin/Invoice/index') ?>" class="btn btn-sm btn-primary">Kembali</a>
</div>