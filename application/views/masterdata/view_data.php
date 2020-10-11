<html>
<div class="container">

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Supplier</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <div align="center">
                        <a href="<?=site_url('c_supplier/insert')?>" class="btn btn-info btn-sm">
                        <span class="fa fa-plus"></span> Tambah Supplier
                        </a>
                    </div>
                    <thead>
                        <tr align="center">
                            <th>ID Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th>Ubah / Hapus</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr align="center">
                                <th>ID Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Email</th>
                                <th>Ubah / Hapus</th>
                            </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <?php
                                $no=1;
                                foreach($supplier as $row):
                                echo "<tr>";
                                echo "<td>".$row['id_supplier']."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['alamat']."</td>
                                <td>".$row['no_telp']."</td>
                                <td>".$row['email']."</td>
                                <td>"
                            ?>

                                <a href="<?=site_url('c_supplier/edit_form/'.$row['id_supplier'])?>" class="btn btn-success btn-sm">
                                    <span class="fa fa-edit"></span>Ubah
                                </a>

                                <a href="<?=site_url('c_supplier/delete_data/'.$row['id_supplier'])?>" class="btn btn-danger btn-sm">
                                    <span class="fa fa-trash"></span>Hapus
                                </a>
                                <?php
                                echo "</td>";
                                echo "</tr>";
                                endforeach;
                                ?>
                        </tr>
                    </tbody>
                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>