<html>

<div class="container">

<div class="card mb-4">
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">

      <?php
	foreach($supplier as $row):
		$id = $row['id_supplier'];
		$nama = $row['nama'];
		$alamat = $row['alamat'];
		$no_telp = $row['no_telp'];
		$email = $row['email'];
    endforeach;
    ?>

        
    <?php echo form_open('c_supplier/update_supplier');?>
        <div class="form-group col-sm-12">
            <input type="hidden" name="id_supplier" class="form-control" value="<?=$id;?>">
            <label><b>Nama Supplier</label><span class="text-danger">*</span>
            <?php echo "<b>".form_error('nama')."</b>"; ?> 
                <input type="text" name="nama" class="form-control" value="<?php echo $nama?>" placeholder="Masukan nama supplier. Contoh: PT Makmur Jaya">
        </div>

        <div class="form-group col-sm-12">
            <label>Alamat Supplier</label><span class="text-danger">*</span>
            <?php echo "<b>".form_error('alamat')."</b>"; ?> 
                <textarea type="textarea" name="alamat" class="form-control" placeholder="Masukan alamat lengkap supplier"><?=htmlspecialchars($alamat);?></textarea>
        </div>

        <div class="form-group col-sm-12">
            <label>No. Telepon</label><span class="text-danger">*</span>
            <?php echo "<b>".form_error('no_telp')."</b>"; ?> 
                <input type="text" name="no_telp" class="form-control" value="<?php echo $no_telp?>" placeholder="Masukan no. telepon supplier. Contoh: 022-229-2010">
        </div>

        <div class="form-group col-sm-12">
            <label class="col-form-email">Email</label><span class="text-danger">*</span>
            <?php echo "<b>".form_error('email')."</b>"; ?> 
                <input type="staticemail" name="email" class="form-control" value="<?php echo $email?>" placeholder="Masukan email supplier. Contoh: makmur-jaya@gmail.com">
        </div>

        <div align="center">
        <button class="btn btn-success" type="submit"><span class="col-sm-1">Simpan</span></button>
        </div>
    </div>

    </form>
</div>
</div>
</div>
</div>