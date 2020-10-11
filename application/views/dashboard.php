<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=$title?></title>
        <link href="<?=base_url()?>assets/css/styles.css" rel="stylesheet" />
        <link href="<?=base_url();?>assets/icon/logo.jpg" rel="icon">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="http://localhost/bolu_lembang/index.php/">Bolu Susu Lembang</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://localhost/bolu_lembang/index.php/auth/logout"><span class="fa fa-sign-out-alt"></span> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="http://localhost/bolu_lembang/index.php/home/"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a>             
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-columns"></i></div>
                                Insert Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                                 <a class="nav-link" href="http://localhost/bolu_lembang/index.php/c_supplier/insert/">Supplier</a>
                                                 <a class="nav-link" href="http://localhost/ASS/index.php/bahan_baku/insert/">Bahan Baku</a>
                                                 <a class="nav-link" href="http://localhost/amanda/index.php/kue/insert">Kue</a>
                                                 <a class="nav-link" href="http://localhost/tb_framework/index.php/karyawan/input_form/">Karyawan</a>
                                                <a class="nav-link" href="http://localhost/bolu_lembang/index.php/pembelian/input_form/">Pembelian</a>  
                                                <a class="nav-link" href="http://localhost/amanda/index.php/Penjualan/input_form">Penjualan</a>
                                                <a class="nav-link" href="http://localhost/ASS/index.php/Retur_pembelian/insert/">Retur Pembelian</a>
                                                <a class="nav-link" href="http://localhost/tb_framework/index.php/penggajian/form_gaji/">Penggajian</a> 
                                   </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                View Data
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        
                                                <a class="nav-link" href="http://localhost/bolu_lembang/index.php/c_supplier/view_data">Supplier</a>
                                                <a class="nav-link" href="http://localhost/ASS/index.php/bahan_baku/">Bahan Baku</a>
                                                <a class="nav-link" href="http://localhost/amanda/index.php/kue/">Kue</a>
                                                <a class="nav-link" href="http://localhost/tb_framework/index.php/karyawan/view_data/">Karyawan</a>
                                                <a class="nav-link" href="http://localhost/bolu_lembang/index.php/pembelian/view_data">Pembelian</a>  
                                                <a class="nav-link" href="http://localhost/amanda/index.php/Penjualan/view_data">Penjualan</a>
                                                <a class="nav-link" href="http://localhost/ASS/index.php/Retur_pembelian/view_retur/">Retur Pembelian</a>
                                                <a class="nav-link" href="http://localhost/tb_framework/index.php/penggajian/view_gaji/">Penggajian</a>
                                           
                                        </nav>
                                </nav>
                            </div>

                            
                            
                            <div class="sb-sidenav-menu-heading">Laporan</div>
                            <a class="nav-link" href="http://localhost/bolu_lembang/index.php/laporan/">
                                <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                                </div>Pembelian
                            </a>
                            <a class="nav-link" href="http://localhost/ASS/index.php/laporan/">
                                <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                                </div>Retur Pembelian
                            </a>
                            <a class="nav-link" href="http://localhost/tb_framework/index.php/lgaji/">
                                <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                                </div>Penggajian
                            </a>
                            <a class="nav-link" href="http://localhost/amanda/index.php/laporan/jurnal">
                                <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                                </div>Jurnal Umum
                            </a>
                            <a class="nav-link" href="http://localhost/amanda/index.php/laporan/bukubesar">
                                <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                                </div>Buku Besar
                            </a>
                            <a class="nav-link" href="http://localhost/amanda/index.php/laporan/inputformkartustok">
                                <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                                </div>Kartu Stok
                            </a>
                            <a class="nav-link" href="http://localhost/amanda/index.php/laporan/labarugi">
                                <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                                </div>Laba Rugi
                            </a>
                            
                                <!--<a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Jurnal</a>-->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?=$this->session->userdata('name')?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 class="mt-4"></h3>
                        <!--<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- notifikasi sukses -->
                               
                                <?php
                                if($this->session->flashdata('sukses')) {
                                $message = $this->session->flashdata('sukses');
                                ?>
                                <div class="alert alert-success" ><?php echo $message; ?>
                                </div>
                                <?php
                                }
                                ?>
                                
                                <?php
                                if($this->session->flashdata('error')) {
                                $message = $this->session->flashdata('error');
                                ?>
                                <div class="alert alert-danger" ><?php echo $message; ?>
                                </div>
                                <?php
                                }
                                ?>

                                <h3 class="text-center">SELAMAT DATANG <?php echo strtoupper($this->session->userdata('name')); ?></h3>
                                <p class="text-center">Anda login sebagai <?php echo $this->session->userdata('role_label'); ?>.</p>
                                   
                            </div>
                        </div>
                        <div class="row">
                            
                            
                        </div>
                        <!--<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Lael Greer</td>
                                                <td>Systems Administrator</td>
                                                <td>London</td>
                                                <td>21</td>
                                                <td>2009/02/27</td>
                                                <td>$103,500</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Donna Snider</td>
                                                <td>Customer Support</td>
                                                <td>New York</td>
                                                <td>27</td>
                                                <td>2011/01/25</td>
                                                <td>$112,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </main>
                
            </div>
        </div>
    </body>
</html>
