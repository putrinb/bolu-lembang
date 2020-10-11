<center>
		<h3>Laporan Pembelian Bahan Baku
		<br>Bolu Susu Lembang
		<br>Per <?=date('d F Y')?>
	</h3>

	<table border="1" style="border-collapse: collapse">
		<tr>
			<th>No</th>
			<th>Tanggal Transaksi</th>
			<th>No Faktur</th>
			<th>Jumlah</th>
		</tr>
		
		<?php $no=0; $gtotal=0; foreach($pembelian as $row) { ?>
			<tr>
				<td><?=$no=$no+1?></td>
				<td><?=$row->Tanggal?></td>
				<td><?=$row->no_faktur?></td>
				<td><?=nominal($row->total)?></td>
				<?php $gtotal=$gtotal+$row->total ?>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="3" class="text-right">Total</td>
			<td><?= nominal($gtotal) ?></td>
		</tr>
		
	</table>
</center>