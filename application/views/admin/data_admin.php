<div class="container-fluid">

	<h2>Data User</h2><br>

	<table class="table table-bordered">
		<tr align="center">
			<th>ID</th>
			<th>Foto</th>
			<th>Nama</th>
			<th>Username</th>
		</tr>
	<?php foreach ($user as $u): ?>
			<tr align="center">
  				<td><?= $u['id'] ?></td>
  				<td><img src="<?= base_url('assets/img/'. $u['foto']) ?>" width="40"></td>
  				<td><?= $u['nama'] ?></td>
  				<td><?= $u['username'] ?></td>
			</tr>
	<?php endforeach ?>
	</table>
</div>