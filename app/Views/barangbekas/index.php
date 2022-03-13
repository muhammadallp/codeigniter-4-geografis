

       <?php 
       $session = session();
       $pesan = $session->getFlashdata('pesan');
        
       ?>
<?= $this->extend('pages/templateadmin'); ?> 

<?= $this->section('content'); ?>


<link rel="stylesheet" href="<?= base_url('assets/css/css.css'); ?>">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4 ">Tables</h1>
                    <?php if($pesan){ ?>
                         <?php echo $pesan?></p>
                        <?php } ?>
                    <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                    </button>                        -->
                    <a class="btn btn-primary mb-3 " href="<?= base_url('barangbekas/tambahdata'); ?>">Tambah Data</a>
                    <input type="button" class="btn btn-primary mb-3" value="Print PDF" onclick="window.open('<?= site_url('barangbekas/printpdf')?>','blank')">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user fa-fw"></i>
                                Barangbekas tabel
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nama Toko</th>
                                            <th>Nomor Handphone </th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Data Dibuat</th>
                                            <th>Gambar</th>

                                         
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($barangbekas as $row): ?>
                                        <tr>
                                    <td><?= $row['nama'];?></td>
                                    <td><?= $row['nohp'];?></td>
                                    <td><?= $row['latitude'];?></td>
                                    <td><?= $row['longitude'];?></td>
                                    <td><?= $row['data_create'];?></td>
                                    <td><img src="/assets/image/barangbekas/<?= $row['image'];?>" class="img"></td>
                                            <td>
                                                <button type="button" class="btn btn-warning  " data-bs-toggle="modal" data-bs-target="#edit<?= $row['id'];?>"><i class="far fa-edit"></i> </button>   
                                                 <a class="btn btn-danger "  onclick="return confirm('Apakah Anda Yakin?')" href="barangbekas/delete/<?= $row['id'];?>"><i class="far fa-trash-alt"></i></a>
                                                </div>
                                                </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


<!-- modal edit -->
<?php $no=0; ?>
<?php foreach($barangbekas as $row): ?>
<div class="modal fade" id="edit<?= $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body">
        
      <form  action="/barangbekas/edit/<?= $row['id'];?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="gambarlama" value="<?= $row['image']; ?>">
                <div class="form-floating mb-3">
                <input type="text" value="<?= $row['nama'];?>" class="form-control " name="nama" placeholder="name@example.com" required>
                <label for="nama" >Nama Toko</label>
                <div class="invalid-feedback">
                    
                </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text"  value="<?= $row['nohp'];?>" class="form-control" name="nohp" placeholder="name@example.com" required >
                    <label for="latitude">Nomor Handphone</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text"  value="<?= $row['latitude'];?>" class="form-control" name="latitude" placeholder="name@example.com" required >
                    <label for="latitude">Latitude</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text"  value="<?= $row['longitude'];?>" class="form-control" name="longitude" placeholder="name@example.com" required >
                    <label for="latitude">Longitude</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="image" >
                    <div class="invalid-feedback">
                    </div>
                </div>



                

             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update changes</button>
      </div>
    </div>
  </div>
</div>
  </form>
<?php endforeach; ?>
<!-- akhir modal Edit -->
          <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"><?= Date('d F Y'); ?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

<!-- akhir Modal Edit -->











<?= $this->endSection(); ?>
