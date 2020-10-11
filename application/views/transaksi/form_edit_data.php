<div class="container">
  
  <?php
	
	foreach($data_form_input as $cacah):
		$no_faktur = $cacah['no_faktur'];
		$id_supplier = $cacah['id_supplier'];
		$NamaSupplier = $cacah['NamaSupplier'];
		$waktu = $cacah['waktu'];
		//$dokumen = $cacah['dokumen'];
	endforeach;
  ?>
   <form action="<?php echo site_url('pembelian/edit_form/'.$no_faktur.'/'.$id_supplier) ?>" method="post" enctype="multipart/form-data" >
   
   <?php
		echo "<b>No Faktur	: </b> ".$no_faktur."<br>";
		echo "<b>Supplier	: </b> ".$NamaSupplier." <br>";
		echo "<b>Waktu Transaksi    	:</b> ".$waktu."<br><br>";
	?>
   
   <div class="form-group">
		  <label for="no_faktur">No Faktur<span class="text-danger">*</span></label>
		  <?php echo "<b>".form_error('no_faktur')."</b>"; ?> 	
		  <input type="text" class="form-control" name="no_faktur" value="<?php echo $no_faktur ?>" placeholder="Masukkan No Faktur cth: PJL2012-01">
	 </div>
   
	 <div class="form-group">
		  <label for="id_supplier">Supplier<span class="text-danger">*</span></label>
		  <select class="form-control" name="id_supplier">
			<?php
			foreach($data_supplier as $cacah_dataSupplier):
					//jika sama maka option-nya diberi selected untuk nilai default sesuai yang tersimpan didatabase
					if(strcmp($cacah_dataSupplier['id_supplier'],$id_supplier)==0){
						?>
						<option value="<?php echo $cacah_dataSupplier['id_supplier']?>" selected><?php echo $NamaSupplier ?></option>	
						<?php
					}else{
					?>
						<option value="<?php echo $cacah_dataSupplier['id_supplier']?>"><?php echo $NamaSupplier ?></option>
					<?php
					}
				?>	
				<?php
			endforeach;
		  ?>
		  </select>
	 </div>
		
	<div class="form-group">
		<label for="tanggal">Tanggal<span class="text-danger">*</span></label>
		<?php echo "<b>".form_error('datetimepicker')."</b>"; ?> 	
		  <div class="input-group date">
                <input type="date" name="datetimepicker" class="form-control datetimepicker" value="<?php echo $waktu ?>"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
	 </div>
	 
	 <div class="form-group">
		  <label for="dokumen">Dokumen:</label>
		  <input type="file" class="form-control-file" name="dokumen">
		  <input type="hidden" name="old_document" value="" />
		</div>
   
	 <div class="row">
		<div class="col-sm-12" style="background-color:white;" align="center">
			<button type="submit" class="btn btn-info">Simpan</button>
		</div>
	</div>
	<p>
		
</form>
</div>
</body>
</html>