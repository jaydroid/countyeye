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
        .data{
            margin-left:auto;
            margin-right:auto;
            font-size: 16px;
            background: #f1f1f1;
            padding: 2%;
            width: 300px;
            border-radius: 5px;
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

      <!-- Page content -->
      
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
                                 <h2>Register</h2>
                                 <hr />
                              </div>
                              <!-- Page title -->
                              <br />
                              <form class="form-horizontal" role="form" method="post">
                                  <div class="data">
                                      <input type="checkbox"> Request a data account <i class="icon-hdd"></i>
                                  </div><br>

                                  <div class="form-group">
                                <?php echo form_error('name'); ?>
                                  <label for="inputName" class="col-lg-2 control-label">Name*</label>
                                  <div class="col-lg-10">
                                    <input name="name" type="text"  value="<?php echo set_value('name'); ?>"  class="form-control" id="inputName" placeholder="Name">
                                  </div>
                                </div>                           
                                <div class="form-group">
                                <?php echo form_error('email'); ?>
                                <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
                                  <div class="col-lg-10">
                                    <input name="email" type="email" value="<?php echo set_value('email'); ?>"  class="form-control" id="inputEmail" placeholder="Email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="dropdown" class="col-lg-2 control-label">County*</label>
                                  <div class="col-lg-10">
                                    <select name="county" class="form-control">
                                        <?php foreach ($county as $row){?>
                                        <option  value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <?php echo form_error('password'); ?>
                                  <label for="inputPassword1" class="col-lg-2 control-label">Password*</label>
                                  <div class="col-lg-10">
                                    <input name="password" type="password" class="form-control" id="inputPassword1" placeholder="Password">
                                  </div>
                                </div>
                              <div class="form-group">
                                  <?php echo form_error('conf_pass'); ?>
                                  <label class="control-label col-md-2">Comfirm Pw:*</label>
                                  <div class="col-md-10">
                                      <input class="form-control" placeholder="Comfirm Password"  name="conf_pass" type="password">
                                  </div>
                              </div>

                                  <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox"> I Agree Terms & Conditions
                                      </label><br>
                                      <label>
                                        Or if you have an account  <a href="<?php echo ('login') ?>">Login</a> 
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <button id="register_btn" class="btn btn-info">Register</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"].style1').checkbox({
            buttonStyleChecked: 'btn-success',
            checkedClass: 'icon-check',
            uncheckedClass: 'icon-check-empty'
        });
    });
</script>
</body>

