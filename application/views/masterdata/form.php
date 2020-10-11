<html>
<div class="container">

<div class="card mb-4">
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <!--<div class="d-flex justify-content-between align-items-center">
                    <div class="section-title">
                    </div>-->

                    <?php echo form_open('c_supplier/insert');?>
                    <div class="form-group col-sm-12">
                        <label><b>Nama Supplier</label><span class="text-danger">*</span>
                        <?php echo "<b>".form_error('nama')."</b>"; ?> 
                            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama');?>" placeholder="Masukan nama supplier. Contoh: PT Makmur Jaya">
                    </div>

                    <div class="form-group col-sm-12">
                        <label>Alamat Supplier</label><span class="text-danger">*</span>
                        <?php echo "<b>".form_error('alamat')."</b>"; ?> 
                            <textarea type="textarea" name="alamat" value="<?php echo set_value('alamat');?>" class="form-control" placeholder="Masukan alamat lengkap supplier"></textarea>
                    </div>

                    <div class="form-group col-sm-12">
                        <label>No. Telepon</label><span class="text-danger">*</span>
                        <?php echo "<b>".form_error('no_telp')."</b>"; ?> 
                            <input type="text" name="no_telp" class="form-control" value="<?php echo set_value('no_telp');?>" placeholder="Masukan no. telepon supplier. Contoh: 022-229-2010">
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="col-form-email">Email</label><span class="text-danger">*</span>
                        <?php echo "<b>".form_error('email')."</b>"; ?> 
                            <input type="staticemail" name="email" class="form-control" value="<?php echo set_value('email');?>" placeholder="Masukan email supplier. Contoh: makmur-jaya@gmail.com">
                    </div>

                    <div align="center">
                    <button class="btn btn-success" type="submit"><span class="col-sm-1">Simpan</span></button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</html>


