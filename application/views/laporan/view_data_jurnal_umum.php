<div class="container">

<div class="row">
		<div class="col-sm-12" style="background-color:white;" align="center">
					<b>Bolu Susu Lembang</b>
		</div>
		<div class="col-sm-12" style="background-color:white;" align="center">
					<b>Jurnal Umum</b>
		</div>
		<div class="col-sm-12" style="background-color:white;" align="center">
				<b>Periode <?php echo format_bulan($bulan)." ".$tahun; ?></b>
		</div>
	</div>
        <p>
		<p>
  <table class="table table-bordered">
    <thead>
      <tr class="text-center">
        <th>Nama Akun</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
		<th>Ref</th>
		<th>Debet</th>
		<th>Kredit</th>
      </tr>
    </thead>
    <tbody>
     <?php
		foreach($jurnal as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['no_faktur']."</td>";
					echo "<td>".$cacah['tanggal']."</td>";
					if(strcmp($cacah['posisi_dr_cr'],'d')==0){
						echo "<td>".$cacah['nama_akun']."</td>";
					}
					else{
						echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$cacah['nama_akun']."</td>";	
					}
					
					echo "<td>".$cacah['no_akun']."</td>";
					if(strcmp($cacah['posisi_dr_cr'],'d')==0){
						echo "<td align='right'>".format_rp($cacah['nominal'])."</td>";
						echo "<td>-</td>";	
					}else{
						echo "<td>-</td>";	
						echo "<td align='right'>".format_rp($cacah['nominal'])."</td>";
					}
				echo "</tr>";	
		endforeach;			
	 
	 ?>
    </tbody>
  </table>
  <p>
	
</div>
</body>
</html>