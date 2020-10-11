<!DOCTYPE html>
<html lang="en">
<head>
  <title>Toko Buah Axila</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?=base_url()?>assets/icon/source.gif" type="image/gif">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.css?v=2.1.5">
  
  <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.3.1.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery/jquery.mask.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/jquery/jquery.fancybox.js?v=2.1.5"></script> 
	
  <script>
		$('.trash').click(function(){
			var id=$(this).data('id');
			$('#modalDelete').attr('href','delete-cover.php?id='+id);
		});
  </script>


 <style>
	.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
		background-color: #CCCCCC;
		color: #6600ff;
	}
  </style>
  <style>
	.trash{padding:2px; border:1px solid red; margin-left:10px; background-color:red; color:#fff}
	td{padding:5px}
</style>
</head>
<body>
<?php
    if(isset($pesan_error)){
        print "<script type=\"text/javascript\">alert('".$pesan_error."')</script>";
    }
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Toko Buah</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Input Data</a>
		<ul class="dropdown-menu">
    <?php 
                //jika kelompoknya admin, maka yang ditampilkan hanya yang berhubungan dengan akun user
                if(strcmp($this->session->kelompok,'Admin')==0){
                  ?>
                    <li><a href="<?php echo site_url("akun/input_form")?>">Akun User</a></li>
                  <?php
                }else{
                  //jika bukan admin maka ditampilkan semua (berarti pegawai / pemilik)
                  ?>
                    <li><a href="<?php echo site_url("buah/input_form")?>">Buah</a></li>
                    <li><a href="<?php echo site_url("supplier/input_form")?>">Supplier</a></li>
                    <li><a href="<?php echo site_url("pembelian/input_form")?>">Pembelian</a></li>
                    <li><a href="<?php echo site_url("penjualan/input_form")?>">Penjualan</a></li>
                  <?php
                }
            ?>
    </ul>
	  </li>
      <li class="dropdown">
		<a data-toggle="dropdown" href="#">View Data</a>
		<ul class="dropdown-menu">
        <?php
             //jika kelompoknya admin, maka yang ditampilkan hanya yang berhubungan dengan akun user
             if(strcmp($this->session->kelompok,'Admin')==0){
               ?>
                  <li><a href="<?php echo site_url("akun/view_data")?>">Akun User</a></li>
               <?php
             }else{
              ?>
                  <li><a href="<?php echo site_url("buah/view_data")?>">Buah</a></li>
                  <li><a href="<?php echo site_url("supplier/view_data")?>">Supplier</a></li>
                  <li><a href="<?php echo site_url("pembelian/view_data")?>">Pembelian</a></li>
                  <li><a href="<?php echo site_url("penjualan/view_data")?>">Penjualan</a></li>
              <?php
             }
        ?>
    </ul>
	  </li>
    <?php         
      //jika kelompoknya admin, maka yang ditampilkan hanya yang berhubungan dengan akun user
      if(strcmp($this->session->kelompok,'Pemilik')==0){
        ?>
              <li class="dropdown">
              <a data-toggle="dropdown" href="#">Laporan</a>
              <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url("laporan/bukubesar")?>">Buku Besar</a></li>
                    <li><a href="<?php echo site_url("laporan/jurnal")?>">Jurnal Umum</a></li>
                    <li><a href="<?php echo site_url("laporan/inputformkartustok")?>">Kartu Stok</a></li>
                    <li><a href="<?php echo site_url("laporan/labarugi")?>">Laporan Laba Rugi</a></li>
                  </ul>
              </li>
        <?php
      }  
    
    ?>

    <li class="dropdown">
      <a href="<?php echo site_url("welcome/logout")?>">Logout</a>
    </li>

    </ul>
    
  </div>
</nav>