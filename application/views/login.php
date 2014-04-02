<head>
    <title><?php echo $title ?></title>
    <?php include 'layout/link_main.php'; ?>
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
    <style type="text/css">
        .navbar-brand span{
            color:#32a0ee;
        }
        .err_custom{
            color: red;
            text-align: center;
        }
    </style>

</head>
	<body>
      <!-- Logo & Navigation starts -->
      <header class="navbar navbar-inverse" role="banner">
          <div class="navbar-header">
              <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">COUNTY<span>EYE</span></a>
          </div>
      </header>

      <!-- Logo & Navigation ends -->
      <div class="page-content blocky">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="awidget login-reg">
                          <div class="awidget-head">

                          </div>
                          <div class="awidget-body">
                              <!-- Page title -->
                              <div class="page-title text-center">
                                  <h2>Login</h2>
                                  <hr />
                              </div>
                              <!-- Page title -->
                              <br />
                              <form class="form-horizontal" role="form" method="post">
                                  <?php
                                        if($this->session->flashdata('login_error')){
                                            echo '<p class="err_custom">'.'*Incorrect username/password'.'</p>';
                                        }
                                  ?>
                                  <div class="form-group">
                                      <?php echo form_error('email'); ?>
                                      <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-10">
                                          <input type="email" name="email" class="form-control" value="<?php echo $this->session->flashdata('email'); ?>" id="inputEmail1" placeholder="Email" required/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <?php echo form_error('password'); ?>
                                      <label for="inputPassword1"  class="col-lg-2 control-label">Password</label>
                                      <div class="col-lg-10">
                                          <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password" required/>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <div class="checkbox">
                                              <label>
                                                  Or if you don't have an a/c<a href="<?php echo ('register') ?>"> Register</a>
                                              </label>
                                          </div>
                                      </div>
                                  </div>
                                  <hr />
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-info">Sign in</button>
                                          <button type="reset" class="btn btn-default">Reset</button>
                                      </div>
                                  </div>
                              </form>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<!--        end container-->
