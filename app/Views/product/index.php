

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
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                    </button>                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user fa-fw"></i>
                                Produk tabel
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nama Product</th>
                                            <th>Harga Product</th>
                                            <th>Kategory</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>

                                         
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($product as $row): ?>
                                        <tr>
                                    <td><?= $row->product_name;?></td>
                                    <td><?= $row->product_price;?></td>
                                    <td><?= $row->category_name;?></td>
                                    <td><?= $row->deskripsi;?></td>
                                    <td><img src="/assets/image/product/<?= $row->image;?>" class="img"></td>
                                            <td>
                                                <button type="button" class="btn btn-warning  " data-bs-toggle="modal" data-bs-target="#edit<?= $row->product_id;?>"><i class="far fa-edit"></i> </button>   
                                                 <a class="btn btn-danger "  onclick="return confirm('Apakah Anda Yakin?')" href="product/delete/<?= $row->product_id;?>"><i class="far fa-trash-alt"></i></a>
                                                </div>
                                                </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
               
        <!-- Modal Save -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form method="POST" action="/product/save" enctype="multipart/form-data">
                <?= csrf_field(); ?>
           <div class="form-floating mb-3">
                <input type="text" class="form-control " name="product_name" placeholder="name@example.com" autofocus required/>
                <label for="nama" >Nama Produk</label>
                <div class="invalid-feedback">
                    
                </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="product_price" placeholder="name@example.com" required/>
                    <label for="latitude">harga Produk </label>
                </div>
                <div class="form-floating mb-4">
                 <select class="form-select" name="product_category" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Open this select menu</option>
                        <?php foreach($category as $row):?>
                        <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                    <label for="floatingSelect">Kategory</label>
                </div>
                
                <div class="form-floating mb-3">
                <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Deskripsi</label>
              </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="image" >
                    <div class="invalid-feedback">
                    </div>
                </div>
           </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
      




<!-- modal edit -->
<?php $no=0; ?>
<?php foreach($product as $row): ?>
<div class="modal fade" id="edit<?= $row->product_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body">
        
      <form  action="/product/edit/<?= $row->product_id;?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="gambarlama" value="<?= $row->image; ?>">
                <div class="form-floating mb-3">
                <input type="text" value="<?= $row->product_name;?>" class="form-control " name="product_name" placeholder="name@example.com" required>
                <label for="nama" >Nama Produk</label>
                <div class="invalid-feedback">
                    
                </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text"  value="<?= $row->product_price;?>" class="form-control" name="product_price" placeholder="name@example.com" required >
                    <label for="latitude">harga Produk</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text"  value="<?= $row->deskripsi;?>" class="form-control" name="deskripsi" placeholder="name@example.com" required >
                    <label for="latitude">Deskripsi</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="image" >
                    <div class="invalid-feedback">
                    </div>
                </div>



                <div class="form-floating mb-3">
                 <select class="form-select" name="product_category"  id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="<?= $row->category_id;?>" ><?= $row->category_name;?></option>
                        <?php foreach($category as $row):?>
                        <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                    <label for="floatingSelect">Kategory</label>
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


<!-- akhir Modal Edit -->

<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><?= Date('d F Y'); ?></div>
                        </div>
                    </div>
                </footer>










<?= $this->endSection(); ?>
