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
		<th>Nama</th>
		<th>Jenis Kelamin</th>
	</tr>
	<?php foreach ($anggota as $key => $value): ?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value->nama ?></td>
			<td><?php echo $value->jenis_kelamin ?></td>
		</tr>
	<?php endforeach ?>
</table>
<script>
	window.print()
	window.onafterprint = window.history.go(-1)
</script>