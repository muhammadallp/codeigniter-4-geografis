<style>
        table,
        td,
        th{
            border:1px solid #333;
        }
        table{
            width:100%;
            border-collapse:collapse;
        }
        td,th{
            padding:2px;
        }
        img{
            width: 70px;
        }
        th{
            background-color: #ccc;
        }
        <style>
        .line-title{
            border:0;
            border-style: inset;
            border-top: 1px solid #000;
        }
        </style>
    
    <title><?= $title; ?></title>
    <center><span style="line-height: 1.6; font-weight: bold; align:center;">
            RONGSOKAN
            </span></center>
      
    <!-- <div class="container-fluid px-4"> -->
    <hr class="line-title">
    <span style="line-height: 1.6; font-weight: bold;">
            Laporan Data Toko
            </span>
                        <div class="container">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><?= Date('d F Y'); ?></div>
                        </div>
                        <br>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                        <th>Nomor</th>
                                        <th>Nama Toko</th>
                                        <th>Nomor Handphone </th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Data Kreate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=0;
                                         foreach($barangbekas as $row):
                                        $no++;

                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['nama'];?></td>
                                            <td><?= $row['nohp'];?></td>
                                            <td><?= $row['latitude'];?></td>
                                            <td><?= $row['longitude'];?></td>
                                            <td><?= $row['data_create'];?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>