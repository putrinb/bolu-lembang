<div class="container">
  <h5>Input Data Detail Pembelian</h5>

<form action="<?php echo site_url('pembelian/input_form_detail') ?>" method="post"  >

<input type="hidden" name="no_faktur" value="<?php echo $_SESSION['no_faktur']; ?>" />
<input type="hidden" name="id_supplier" value="<?php echo $_SESSION['id_supplier']; ?>" />
<input type="hidden" name="datetimepicker" value="<?php echo $_SESSION['datetimepicker']; ?>" />
 
   
<div class="form-group">
 <label for="kode_bb">Bahan Baku<span class="text-danger">*</span></label>
 <select class="form-control" name="kode_bb">
<?php
foreach($bahanbaku as $cacah_bahanbaku):
?>
<option value="<?php echo $cacah_bahanbaku['kode_bb']?>"><?php echo $cacah_bahanbaku['nama_bahan']?></option>
<?php
endforeach;
 ?>
 </select>
</div>

<div class="form-group">
 <label for="harga">Harga Satuan<span class="text-danger">*</span></label>
 <?php echo "<b>".form_error('harga')."</b>"; ?>
 <input type="text" class="form-control" id="harga" name="harga" value="<?php echo set_value('harga'); ?>" placeholder="Masukkan harga">
</div>

<div class="form-group">
 <label for="jumlah">Jumlah Pembelian<span class="text-danger">*</span></label>
 <?php echo "<b>".form_error('jumlah')."</b>"; ?>
 <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo set_value('jumlah'); ?>" placeholder="Masukkan jumlah pembelian">
</div>


<div class="row">
<div class="col-sm-12" style="background-color:white;" align="center">
<button type="submit" class="btn btn-success">
<span class="glyphicon glyphicon-shopping-cart"></span> Tambah ke Keranjang</button>
</div>
</div>
<p>

</form>

<script>
$(document).ready(function(){
// Format mata uang.
$('#harga').mask('0.000.000.000.000.000', {reverse: true});

})
</script>




    </body>

</div>
</form>
</html>