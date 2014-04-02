<head>
	<!-- Custom CSS -->
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
    <link rel="stylesheet" id="googlefonts-css" href="http://fonts.googleapis.com/css?family=Federo:400&amp;subset=latin" type="text/css" media="all">
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
	<style type="text/css">

    body{
    font-family: 'federo', Courier, monospace;
    }
    .ttl_big{
    color: #16cbe6;
    width: 80%;
    padding-bottom: 2%;
    margin: auto;
    margin-top: 5%;
    border-bottom: 1px solid #EAE5ED;
    text-align: center;
    font-family: 'federo', Courier, monospace;
    }
    .explain{
        text-align: center;
        font-size: 15px;
    }
    .admin-hero{
	text-align: center;
	margin-top: 3%;
    margin-bottom: 5%;
    }
    .admin-hero h2{
    font-family: 'federo', Courier, monospace;
    font-size: 18px;
    }
	.header{
	background: none;
	border: none;
	}
	.system{
	/*margin-top: 2%;*/
	text-align: center;
    margin: auto;
    background: #5fafe4;
    padding: 5px;
    width: 30%;
    border-radius: 10px;
	font-size: 18px;
	color: #FFF;
	text-shadow:1px 1px 1px #333;
	opacity: 0.9;
    }
	.system span{
	border-bottom: 1px dotted;
	}
    .account{
    background: #4b8db5;
    transition: background 0.7s;
    -moz-transition: background 0.7s;
    -webkit-transition: background 0.7s;
    list-style-type: none;
    float: left;
    text-align: center;
    line-height: 40px;
    margin-right: 2px;
    font-size: 22px;
    margin-top: 10px;
    padding: 5px;
    }
    .account:hover{
    background:red;
    }
    .acc a {
    color: #fff;
    }
	</style>
</head>
<body>


<div class="homepage-search">
<div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <!-- Logo -->
                  <div class="logo">

                  </div>
               </div>
               <div class="col-md-3">

               </div>
               <div class="col-md-6">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="navbar-right" role="navigation">
                          <?php if(!$this->session->userdata('name')){ ?>
                          <ul class="acc">
                              <a href="<?php echo ('login')?>"><li class="account" tooltip="login"><i class="icon-user"></i></li></a>
                              <a href="<?php echo ('register')?>"><li class="account"><i class="icon-edit"></i></li></a>
                          </ul>
                          <?php }?>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
		<div class="homepg-logo"></div>
		<div class="input-box">
		     <form action="<?php echo ('search'); ?>" class="form-horizontal padded" method="post">
		        <div class="input-group form">
				        <select name="county" class="form-control" >
					          <?php foreach ($county as $row){?>
					          <option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
					          <?php } ?>
				        </select><span class="input-group-btn"><input type="submit" class="btn btn-info" value="See Projects"></span>
	             </div>
		        </div>
		    </form>
		    <div class="system">
		    	<p>
		    		Over <span>35,000</span>  Projects in <span>47</span> Counties
		    	</p>
		    </div>
		</div>
	</div>
	<!-- end body search -->
    <h2 class="ttl_big">
        CountyEye Is a County Government Accountability Tool
    </h2>
    <br/>
    <p class="explain">
        CountyEye allows you to view Government projects in your county, make comments and even flag projects you suspect of
        misappropriation. <br/>
        Also get to see visualized data of the projects your county government is undertaking.
    </p>
	<div class="admin-hero">
		 <ul class="list-inline">
		    <li>
		       <span class="hero-icon"><i class="icon-map-marker"></i></span>
		       <hr>
		       <h2>See Projects</h2>
		    </li>
		    <li>
		       <span class="hero-icon"><i class="icon-comment"></i></span>
		       <hr>
		       <h2>Comment</h2>
		    </li>
		    <li>
		       <span class="hero-icon"><i class="icon-flag"></i></span>
		       <hr>
		       <h2>Flag Projects</h2>
		    </li>
		    <li>
		       <span class="hero-icon"><i class="icon-signal"></i></span>
		       <hr>
		       <h2>See Stats</h2>
		    </li>

		 </ul>

	</div>

</body>

                         