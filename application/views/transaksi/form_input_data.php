
<div class="container">
  <form action="<?php echo site_url('pembelian/input_form') ?>" method="post" >
 
<div class="form-group">
 <label for="no_faktur">No. Faktur<span class="text-danger">*</span></label>
 <?php echo "<b>".form_error('no_faktur')."</b>"; ?>
 <input type="text" class="form-control" name="no_faktur" value="<?php echo set_value('no_faktur'); ?>" placeholder="Masukkan No Faktur. Contoh: PBL001">
</div>
   
<div class="form-group">
 <label for="id_supplier">Supplier<span class="text-danger">*</span></label>
 <select class="form-control" name="id_supplier">
<?php
foreach($datasupplier as $cacah_datasuplier):
?>
<option value="<?php echo $cacah_datasuplier['id_supplier']?>"><?php echo $cacah_datasuplier['nama']?></option>
<?php
endforeach;
 ?>
 </select>
</div>

<div class="form-group">
<label for="tanggal">Tanggal<span class="text-danger">*</span></label>
<?php echo "<b>".form_error('datetimepicker')."</b>"; ?>
 <div class="input-group date">
                <input type="date" name="datetimepicker" class="form-control datetimepicker" value="<?php echo set_value('datetimepicker'); ?>" max="<?=date('Y-m-d')?>"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
</div>

<div class="row">
<div class="col-sm-12" style="background-color:white;" align="center">
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</div>
<p>

</form>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/moment-with-locales.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>


<!--<script type="text/javascript">
$(function () {
$('.datetimepicker').datetimepicker({
                format: 'YYYY-mm-dd HH:mm:ss',
            });
});
   </script>-->
    </body>
</p>
</form>
</div>
</html>
