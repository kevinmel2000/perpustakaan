<style>
	table{
		font-family: sans-serif;
		border-collapse: collapse;
	}
	th, td{
		padding: 10px;
	}
	th{
		text-align: left;
	}
</style>
<table width="100%" border="1">
	<tr>
		<th>No</th>
		<th>Judul</th>
		<th>Peminjam</th>
		<th>Jumlah</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Terlambat</th>
		<th>Status</th>
	</tr>
	<?php foreach ($peminjaman as $key => $value): ?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value->judul ?></td>
			<td><?php echo $value->peminjam ?></td>
			<td><?php echo $value->jumlah ?></td>
			<td><?php echo $value->tanggal_pinjam ?></td>
			<td><?php echo $value->tanggal_kembali ?></td>
			<td><?php echo $value->terlambat ?> hari</td>
			<td><?php echo $value->status ?></td>
		</tr>
	<?php endforeach ?>
</table>
<script>
	window.print()
	window.onafterprint = window.history.go(-1)
</script>