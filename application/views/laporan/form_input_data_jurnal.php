
<div class="container">
  <h3>Input Periode Jurnal Umum</h3>
  <form action="<?php echo site_url('jurnal/jurnalumum') ?>" method="post" >
  
	<div class="form-group">
		  <label for="no_faktur">Bulan<span class="text-danger">*</span>:</label>
		  <select class="form-control" name="bulan">
			<option value="1">Januari</option>
			<option value="2">Februari</option>
			<option value="3">Maret</option>
			<option value="4">April</option>
			<option value="5">Mei</option>
			<option value="6">Juni</option>
			<option value="7">Juli</option>
			<option value="8">Agustus</option>
			<option value="9">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		  </select>	  
	 </div>
	 
	 <div class="form-group">
		  <label for="tahun">Tahun<span class="text-danger">*</span>:</label>
		  <select class="form-control" name="tahun">
			<?php
			foreach($tahun as $cacah_tahun):
				?>	
					<option value="<?php echo $cacah_tahun['tahun']?>"><?php echo $cacah_tahun['tahun']?></option>
				<?php
			endforeach;
		  ?>
		  </select>
	 </div>
	 
	 <div class="row">
		<div class="col-sm-12" style="background-color:white;" align="center">
			<button type="submit" class="btn btn-info">Proses</button>
		</div>
	</div>
	<p>
	
	</form>	
		
    </body>
	</div>
</html>






