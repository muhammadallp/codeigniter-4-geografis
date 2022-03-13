<?= $this->extend('pages/template'); ?> 
   
   <?= $this->section('content'); ?>


            <div id="layoutSidenav_content">
              
                <main>
                    <div class="container-fluid px-4">
                                        
                    <div class="content">
                      <div class="container">
                        <div class="row">
                        <?php foreach ($produk as $row):?>
                                  <div class="col-lg-3   mt-3 ">
                                    <div class="kotak">
                                    <!-- <div class="card text-center"> -->
                                    <form method="post" action="shopping/tambah" method="post" accept-charset="utf-8">
                                     <img class="card-img-top" src="/assets/image/product/<?= $row->image;?>" height="180px"/></a>
                                      <div class="card-body text-center" >
                                        <h4 class="card-title">
                                          <?= $row->product_name;?>
                                        </h4>
                                        <h6>Rp. <?= number_format($row->product_price,0,",",".");?> /KG</h6>
                                        <p class="card-text"><?= $row->deskripsi;?></p>
                                      
                                      <!-- <div class="card-footer"> -->

                      
                                        <input type="hidden" name="product_id" value="<?= $row->product_id; ?>" />
                                        <input type="hidden" name="product_name" value="<?= $row->product_name; ?>" />
                                        <input type="hidden" name="product_price" value="<?= $row->product_price?>" />
                                        <input type="hidden" name="image" value="<?= $row->image; ?>" />
                                        <input type="hidden" name="qty" value="1" />
                                        <!-- <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"   ></i> Beli</button> -->
                                      </div>
                                      </form>
                                    <!-- </div> -->
                                    </div>
                                  </div>
                      <?php endforeach; ?>
                        </div>
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