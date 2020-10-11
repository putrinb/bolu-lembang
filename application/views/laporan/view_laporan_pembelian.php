<html>
<div class="container">
<div class="py-3">
	<a href="<?=site_url('pembelian/input_form')?>" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data</a>
<a target="_blank" href="<?=site_url('laporan/pembelian_pdf')?>" class="btn btn-danger"><span class="fa fa-download"></span> Export PDF</a>
<a href="<?=site_url('laporan/pembelian_excel')?>" class="btn btn-success"><span class="fa fa-download"></span> Export Excel</a>
</div>

<center><hr>
	<h4>Laporan Pembelian Bahan Baku</h4>
	<h5>Bolu Susu Lembang<h5>Per <?=date('d F Y')?></h5>
</center><hr>
<a class="btn btn-secondary btn-sm" href="<?=site_url('laporan')?>">Harian</a>
<a class="btn btn-secondary btn-sm" href="<?=site_url('laporan/pembelian_perbulan')?>">Bulanan</a><br>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal Transaksi</th>
      		<th>No Faktur</th>
			<th>Jumlah</th>
		</tr>
	</thead>


	<tbody>
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
	</tbody>
</table>
</div>
</html>

