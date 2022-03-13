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
        <link href="<?= base_url('assets/css/css.css'); ?>" rel="stylesheet" >
        <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet" >
        
        
      
        <!-- <link rel="icon" href="/assets/img/logo.ico" type="image/gif">  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">





    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">RONGSOKAN</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search -->

             <ul class="d-none d-md-inline-block  ms-auto me-0 me-md-2 my-1 my-md-0">
                <div class="navbar-nav dropdown"> 
                    
                </div>
            </ul>

            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
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
                        <div class="sb-sidenav-menu-heading">User</div>
                        <a class="nav-link"  href="<?= base_url('/admin'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-home" ></i></div>
                           Home
                        </a>
                        <a class="nav-link"  href="<?= base_url('user/pesan'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                            Pesan
                        </a>
                        <!-- <a class="nav-link"  href="<?= base_url('shopping/pesanan'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                            About Me
                        </a> -->
                    </div>                    
            </nav>
        </div>






<?= $this->renderSection('content'); ?>
    


                <!-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><?= Date('d F Y'); ?></div>
                            <div class="bola">
                                <a href="#"><img src="<?= base_url('/assets/image/ig.png') ?>" class="img-profile rounded-circle" style="height: 28px;" >@putti_bordir</a>
                                &middot;
                                <a  href="#"><img src="<?= base_url('/assets/image/wa.jpg') ?>" class="img-profile rounded-circle" style="height: 28px;" >082283327577</a>
                            </div>
                        </div>
                    </div>
                </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/scripts.js'); ?> "></script>
    <script src="<?= base_url('assets/js/datatables-simple-demo.js');?>"></script>
           
        </body>
    </html>