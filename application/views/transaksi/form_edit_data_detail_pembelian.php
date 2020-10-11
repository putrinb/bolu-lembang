<div class="container">
<?php 
    //cacah data dari tabel detail pembelian dengan id sesuai dengan inputan user
	foreach($data_form_input as $cacah):
		$id_transaksi_pembelian = $cacah['id_transaksi_pembelian'];
		$kode_bb = $cacah['kode_bb'];
		$id_supplier = $cacah['id_supplier'];
		$harga_satuan = $cacah['harga_satuan'];
		$jumlah = $cacah['jumlah'];
		$no_faktur = $cacah['no_faktur'];
		$nama_bahan = $cacah['nama_bahan'];
		$namasupplier = $cacah['NamaSupplier'];
	endforeach;
?>

<form action="<?php echo site_url('pembelian/edit_form_detail') ?>" method="post"  >
    <input type="hidden" class="form-control" id="id_transaksi_pembelian" name="id_transaksi_pembelian" value="<?php echo $id_transaksi_pembelian ?>">
	<?php
		echo "<b>No Faktur	: </b>".$no_faktur."<br>";
		echo "<b>Supplier : </b>".$namasupplier."<br>";
		echo "<b>Bahan Baku : </b>".$nama_bahan."<br><br>";
	?>
	<div class="form-group">
		  <label for="harga">Harga Satuan<span class="text-danger">*</span></label>
		  <?php echo "<b>".form_error('harga')."</b>"; ?> 	
		  <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga_satuan ?>" placeholder="Masukkan harga">
	</div>	
	
	 <div class="form-group">
	  <label for="jumlah">Jumlah Pembelian<span class="text-danger">*</span></label>
	  <?php echo "<b>".form_error('jumlah')."</b>"; ?> 	
	  <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $jumlah ?>" placeholder="Masukkan jumlah pembelian">
	</div>
	
	<div class="row">
		<div class="col-sm-12" style="background-color:white;" align="center">
			<button type="submit" class="btn btn-success">Simpan</button>
		</div>
	</div>
	<p>
	
	</form>	
	
	 <script>
		$(document).ready(function(){
			// Format mata uang.
			$('#harga').mask('0.000.000.000.000.000', {reverse: true});		
			$('#jumlah').mask('0.000.000.000.000.000', {reverse: true});		
		})
	 </script>
		
    </body>
</p>
</form>
</div>
</html>






