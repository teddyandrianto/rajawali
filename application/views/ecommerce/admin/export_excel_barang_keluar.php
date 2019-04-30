<?php
 
 header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
 
 header("Content-Disposition: attachment; filename=Tabungan".date('d-m-Y').".xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
  <table width="100%">
      <tr>
        <th colspan="7"><b><h3>LAPORAN PENGELUARAN BARANG</h3></b></th>
      </tr>
      <tr>
        <th colspan="7"><b><h3>
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
    

                 ?></h3></b></th>
      </tr>
      <tr>
        <th colspan="5"><b></th>
      </tr>
    
  </table>
   <table border="1" width="100%" >
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
                    <th><?php echo number_format($data_sum->harga_jual-$data_sum->harga_beli, 0, ',', '.');?></th>
                  </tr> 
                </tbody>
              </table>