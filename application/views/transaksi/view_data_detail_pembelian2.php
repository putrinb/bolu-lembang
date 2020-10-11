<html>
<div class="container">

<table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
<?php 
    //cacah data dari tabel detail pembelian dengan id sesuai dengan inputan user
	foreach($isi_data as $cacah):
		$id_transaksi_pembelian = $cacah['id_transaksi_pembelian'];
		$kode_bb = $cacah['kode_bb'];
		$id_supplier = $cacah['id_supplier'];
		$harga_satuan = $cacah['harga_satuan'];
		$jumlah = $cacah['jumlah'];
		$no_faktur = $cacah['no_faktur'];
		$nama_bahan = $cacah['nama_bahan'];
		$namasupplier = $cacah['NamaSupplier'];
	endforeach;
	
		echo "<b>No Faktur	: </b> ".$no_faktur."<br>";
		echo "<b>Supplier	 : </b> ".$namasupplier."<br><br>";
	?>
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Bahan Baku</th>
                <th class="text-center">Supplier</th>
                <th class="text-center">Jml</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Total</th>
				<th class="text-center">Ubah/Hapus</th>
            </tr>
        </thead>
        <tbody>
		<?php
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['id_transaksi_pembelian']."</td>";
					echo "<td>".$cacah['nama_bahan']."</td>";
					echo "<td>".$cacah['NamaSupplier']."</td>";
					echo "<td>".$cacah['jumlah']."</td>";
					echo "<td>Rp ".number_format($cacah['harga_satuan'])."</td>";
					echo "<td>Rp ".number_format($cacah['jumlah']*$cacah['harga_satuan'])."</td>";
					echo "<td>";
						?>
							<button onclick="location.href = '<?php echo site_url('pembelian/edit_form_detail/'.$cacah['id_transaksi_pembelian']) ?>';" type="button" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-edit"></span> Ubah
							</button>
							<a onclick="deleteConfirm('<?php echo site_url('pembelian/delete_form_detail2/'.$cacah['id_transaksi_pembelian'].'/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>')" href="#!" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span> Hapus
							</a>
						<?php
					echo "</td>";
				echo "</tr>";
			endforeach;
		?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Bahan Baku</th>
                <th class="text-center">Supplier</th>
                <th class="text-center">Jml</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Total</th>
				<th class="text-center">Ubah/Hapus</th>
            </tr>
        </tfoot>
    </table>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
		</div>
	</div>
</div>
	</div>				
<p>
</div>
</body>
</html>