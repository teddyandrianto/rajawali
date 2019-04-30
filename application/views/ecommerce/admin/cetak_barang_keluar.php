<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.table1 {
    color: #000;
    border-collapse: collapse;
    font-family: sans-serif;
    font-size: 30px;
}
 
.table1, th, td {
    border: 1px solid #000;
    padding: 10px 1px;
}
   .text_header{
    font-family: sans-serif;
    font-size: 32px;
   }
   .table2{
    color: #000;
    border-collapse: collapse;
    font-family: sans-serif;
    font-size: 30px; 
   }
   .table2, th, td {
    padding: 6px 6px;
}
   tfoot{
   	font-weight: bold;
   }

    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
	</style>
     <script type="text/javascript">
        window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 100);

        function submitform(){
          window.print();
          document.forms["myForm"].submit();
        }

        function autoRefresh(){
           clearTimeout(auto);
           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 100);
        }
    }
     </script>

<body style="margin-top: 80px;"><center>
		<p class="text_header">LAPORAN BARANG KELUAR<br>
        BULAN     <?php 
                            $array1=explode("-",$_GET['date']);
                            $tahun=$array1[0];
                            $bulan=$array1[1];
                            if($bulan==1){
                              $bulan_huruf="JANUARI";
                            }elseif($bulan==2){
                              $bulan_huruf="FEBRUARI";
                            }elseif($bulan==3){
                              $bulan_huruf="MARET";
                            }elseif($bulan==4){
                              $bulan_huruf="APRIL";
                            }elseif($bulan==5){
                              $bulan_huruf="MEI";
                            }elseif($bulan==6){
                              $bulan_huruf="JUNI";
                            }elseif($bulan==7){
                              $bulan_huruf="JULI";
                            }elseif($bulan==8){
                              $bulan_huruf="AGUSTUS";
                            }elseif($bulan==9){
                              $bulan_huruf="SEPTERMBER";
                            }elseif($bulan==10){
                              $bulan_huruf="OKTOBER";
                            }elseif($bulan==11){
                              $bulan_huruf="NOVEMBER";
                            }elseif($bulan==12){
                              $bulan_huruf="DESEMBER";
                            }

                            echo $bulan_huruf.' '.$tahun
                  ?></p>
      </p>
       <table class="table1" width="1250px" >
                <tbody> <tr>
                  <th style="width: 10px">No</th>
                  <th style="width: 160px">Tanggal</th> 
                  <th>Nama barang</th>
                  <th>Jumlah</th>
                  <th>Harga Jual</th>
                  <th>Harga Beli</th>
                  <th>Keuntungan</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($data as $d) { ?>

                <tr>
                  <th><?php echo $no++ ;?></th> 
                  <td><?php echo $d->waktu ?></td>
                  <td><?php echo $d->nama_barang ?></td>
                  <td><?php echo $d->jumlah_beli ?></td>
                  <td><?php echo  number_format($d->harga_jual, 0, ',', '.'); ?></td>
                  <td><?php echo number_format($d->harga_beli, 0, ',', '.'); ?></td>
                  <td><?php echo number_format(($d->harga_jual-$d->harga_beli)*$d->jumlah_beli, 0, ',', '.'); ?></td>
                </tr>
                <?php } ?>
                              
                  <tr>
                    <th colspan="3">Total</th>
                    <th> <?php echo number_format($data_sum->jumlah_beli, 0, ',', '.');?></th>
                    <th><?php echo number_format($data_sum->harga_jual, 0, ',', '.');?></th>
                    <th><?php echo number_format($data_sum->harga_beli, 0, ',', '.');?></th>
                    <th><?php echo number_format($data_sum->keuntungan, 0, ',', '.');?></th>
                  </tr> 
                </tbody>
              </table>
                          </center>
                          <form name="myForm" id="myForm"  action="<?php echo base_url('ecommerce/admin_barang') ?>" method="GET">

                          </form>

</body>
</html>