<!DOCTYPE html>
<html><head>
</head><body>
    <table border="1">
    <tr>
        
        <th>No</th>
        <th>Nama Dokumen</th>
        <th>Jenis Dokumen</th>
        <th>Bagian/Kebun</th>
        <th>PIC</th>
        <th>Masa Aktif</th>
        <th>Akses</th>
    </tr>
    <?php
            $no=1;
            foreach ($data_dokumen as $dd) :
                // echo '<pre>';
                // print_r($dd) ;
                // echo '</pre>';
                // die();
            ?>
            <tr>
                <td><span style="color:green;font-weight:bold;"><?php echo $no++ ?></span></td>
                <td><span style="color:green;font-weight:bold;"><?php echo $dd['nama_dokumen'] ?></span></td>
                <td><span style="color:green;font-weight:bold;"><?php echo $dd['nama_jenis_dokumen'] ?></span></td>
                <td><span style="color:green;font-weight:bold;"><?php echo $dd['nama_bagian'] ?> </span></td>
                <td><span style="color:green;font-weight:bold;"><?php echo $dd['pic'] ?></span></td>
                <td><span style="color:green;font-weight:bold;">
                    <?php 
                        echo  date('d/m/Y', strtotime($dd['masa_aktif_awal']));
                        echo ' - ';
                        echo date('d/m/Y', strtotime($dd['masa_aktif_akhir']));
                    ?></span>
                </td>
                
                <td><span style="color:green;font-weight:bold;">
                <?php foreach ($master_bagian as $usr) : ?>
                    <?php  $str = $dd['akses_for'];
                            $str1 = explode(",",$str);
                            $jumlahdata = count($str1);
                            for ($i=0; $i < $jumlahdata; $i++) { 
                                if ($usr->id_bagian == $str1[$i]) {
                                echo '-'.$usr->nama_bagian.'<br>';
                                }
                            }
                            
                    ?> 
                        <?php endforeach; ?></span>
                </td>
            </tr>
            <tr>
                <th>#</th>
                <th colspan="2">Masa Aktif Lama</th>
                <th colspan="2">Upload Dokumen</th>
                <th colspan="2">Log Pembaruan</th>
            </tr>
            <?php
                $id_dokumen = $dd['iddkm'];
                $nama = $this->session->userdata('username');
                $query_dokumen1 = $this->db->query("SELECT * FROM tb_user 
                LEFT JOIN tb_dokumen ON tb_user.id = tb_dokumen.id_user
                LEFT JOIN histori_pembarui_dokumen ON tb_dokumen.id = histori_pembarui_dokumen.id_dokumen
                LEFT JOIN tb_master_jenis_dok ON tb_dokumen.jenis_dok = tb_master_jenis_dok.id
                WHERE tb_user.username = '$nama' && histori_pembarui_dokumen.id_dokumen = '$id_dokumen'");
                $data['histori_data_dokumen'] = $query_dokumen1->result_array();
                $noo=a;
                foreach ($data['histori_data_dokumen'] as $hdd) :
            ?>
            <tr>
                <td><?php echo $noo++ ?></td>
                <td  colspan="2"><?php echo $hdd['masa_aktif_awal_lama'] ?>- <?php echo $hdd['masa_aktif_akhir_lama'] ?></td>
                <td  colspan="2"><?php echo $hdd['upload_dokumen_lama'] ?></td>
                <td  colspan="2"><?php echo $cnvrt_masa_aktif_awal = date('d-m-Y', strtotime($hdd['log'])); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
</table>
</body></html>
	
    
    
    