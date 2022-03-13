<?php 
                 $session = session();
                 $login = $session->getFlashdata('login');
                  $logout = $session->getFlashdata('logout');
                 $username = $session->getFlashdata('username');
                $password = $session->getFlashdata('password');  
                     ?>
        
        <?= $this->extend('layout/template'); ?> 
   
   <?= $this->section('content'); ?>

   <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">

                                    <?php if($username){ ?>
                                   <?php echo $username?></p>
                                    <?php } ?>
                                    
                                    <?php if($password){ ?>
                                       <?php echo $password?></p>
                                        <?php } ?>
                                        
                                        <?php if($login){ ?>
                                        <?php echo $login?></p>
                                    <?php } ?>
                                        <?php if($logout){ ?>
                                        <?php echo $logout?></p>
                                    <?php } ?>


                                        <form  class="user" method="POST" action="<?= base_url('/auth/valid_login'); ?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="username" placeholder="name@example.com" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                            <input type="submit" value="Login" class="btn btn-primary btn-block">
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('/auth/register'); ?>">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

   
   <?= $this->endSection(); ?>