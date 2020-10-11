<html>
<div class="container">
<br>

<table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
        <thead>
            <tr>
                <th class="text-center">No Faktur</th>
                <th class="text-center">Supplier</th>
                <th class="text-center">Tanggal Transaksi</th>
<!--<th class="text-center">Upload</th>-->
<th class="text-center">Detail</th>
<th class="text-center">Ubah/Hapus</th>
            </tr>
        </thead>
        <tbody>
<?php
foreach($isi_data as $cacah):
echo "<tr>";
echo "<td>".$cacah['no_faktur']."</td>";
echo "<td>".$cacah['NamaSupplier']."</td>";
echo "<td align='center'>".$cacah['waktu']."</td>";

/*jika data dokumen di database tidak ada
          if(!isset($cacah['dokumen'])){
            $dokumen = '';
            $pdf = '';
          }else{
            $dokumen = 'lihat';
            //jika qr code sudah ada maka laporan sudah bisa digenerate
            if(strcmp($dokumen,'lihat')==0){
              $pdf = ' | cetak';
            }
          }*/
?>

<!--<?php
// //jika data dokumen di database tidak ada
// if(!isset($cacah['qrcode'])){
// $qrcode = '';
// echo "<td></td>";
// }else{
?>
<td class="text-center">
<a href="<?php echo base_url('upload/pembelian/qrcode/'.$cacah['qrcode']) ?>" class="perbesar">
<img src="<?php echo base_url('upload/pembelian/qrcode/'.$cacah['qrcode']) ?>" class="img-thumbnail" width="64" />
</a>
  </td>
<?php
//}
?>
<td align='center'>
  <a href="<?php echo base_url('upload/pembelian/'.$cacah['dokumen'])?>" target="_blank">
  <?php echo $dokumen?>
  </a>
</td>-->
<td class="text-center">
<button onclick="location.href = '<?php echo site_url('pembelian/view_data_pembelian_detail2/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>'" type="button" class="btn btn-info btn-sm">
<span class="glyphicon glyphicon-menu-hamburger"></span> Detail
</td>
<td class="text-center">
<button onclick="location.href = '<?php echo site_url('pembelian/edit_form/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>'" type="button" class="btn btn-success btn-sm">
<span class="glyphicon glyphicon-edit"></span> Ubah
</button>
<a onclick="deleteConfirm('<?php echo site_url('pembelian/delete_form/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>')" href="#!" class="btn btn-danger btn-sm">
<span class="glyphicon glyphicon-trash"></span> Hapus
</a>
</td>
</tr>
<?php
endforeach;
?>
        </tbody>
        <!--<tfoot>
            <tr>
                <th class="text-center">No Faktur</th>
                <th class="text-center">Supplier</th>
                <th class="text-center">Waktu</th>
                <th class="text-center">Dokumen</th>
<th class="text-center">QrCode</th>
<th class="text-center">Upload</th>
<th class="text-center">Detail</th>
<th class="text-center">Ubah/Hapus</th>
            </tr>
        </tfoot>-->
    </table>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
$(".perbesar").fancybox();
} );
</script>
<script>
function deleteConfirm(url){
$('#btn-delete').attr('href', url);
$('#deleteModal').modal();
}
</script>
<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>