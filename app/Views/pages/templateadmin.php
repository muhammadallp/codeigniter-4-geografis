<?php $session = session(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title; ?></title>
        <link href="<?= base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url('assets/css/css.css'); ?>">
        
      
        <!-- <link rel="icon" href="/assets/img/logo.ico" type="image/gif">  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">





    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">RONGSOKAN</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav  ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mr-3 d-none d-lg-inline text-gray-600 small"><?php echo $session->get('nama')?></span><img src="<?= base_url('/assets/image/profil/'.$session->get('image')) ?>" class="img-profile rounded-circle" style="height: 28px;" ></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?=base_url('/auth/logout')?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link"  href="<?= base_url('/admin'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link"  href="<?= base_url('admin/pesan'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                            Pesanan
                        </a>                        
                        <div class="sb-sidenav-menu-heading">Admin</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Data Toko
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="<?= base_url('admin/pesanan'); ?>" >
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Pesanan

                                </a>
                                <a class="nav-link collapsed" href="<?= base_url('product/'); ?>" >
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>   
                                    produk
                                    </a>
                                <a class="nav-link collapsed" href="<?= base_url('category/'); ?>" >
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>   
                                    Kategory
                                    </a>
                                    <a class="nav-link collapsed" href="<?= base_url('barangbekas/'); ?>" >
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>   
                                    Barang Bekas
                                    </a>
                                </nav>
                            </div>
                        <a class="nav-link"  href="<?= base_url('admin/datauser'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                           Data User
                        </a>  
                    </div>
                </div>
            </nav>
        </div>

      







<?= $this->renderSection('content'); ?>
    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/scripts.js'); ?> "></script>
    <script src="<?= base_url('assets/js/datatables-simple-demo.js');?>"></script>
           
        </body>
    </html>