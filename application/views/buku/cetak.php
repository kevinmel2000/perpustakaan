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
		<th>Kode</th>
		<th>Nama</th>
		<th>Kategori</th>
		<th>Jumlah</th>
		<th>Dipinjam</th>
	</tr>
	<?php foreach ($buku as $key => $value): ?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value->kode ?></td>
			<td><?php echo $value->nama ?></td>
			<td><?php echo $value->kategori ?></td>
			<td><?php echo $value->jumlah ?></td>
			<td><?php echo $value->dipinjam ?></td>
		</tr>
	<?php endforeach ?>
</table>
<script>
	window.print()
	window.onafterprint = window.history.go(-1)
</script>