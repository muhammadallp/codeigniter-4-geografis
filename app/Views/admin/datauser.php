

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
                        <h1 class="mt-4">Tables</h1>
                        <?php if($pesan){ ?>
                         <?php echo $pesan?></p>
                        <?php } ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user fa-fw"></i>
                                User Data Table
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Foto</th>
                                            <th>Data create</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($user as $s): ?>
                                        <tr>
                                            <td><?= $s['username']; ?></td>
                                            <td><?= $s['nama']; ?></td>
                                            <td><img src="/assets/image/profil/<?= $s['image']; ?>" class="img" ></td>
                                            <td><?= $s['data_create']; ?></td>
                                            <td>
                                                <div class="container">
                                                 <a class="btn btn-danger"  onclick="return confirm('Apakah Anda Yakin?')" href="delete/<?= $s['id']; ?>"><i class="fas fa-user-minus"></i></a>   
                                                </div>
                                                </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><?= Date('d F Y'); ?></div>
                        </div>
                    </div>
                </footer>
           

        
        

<?= $this->endSection(); ?>
