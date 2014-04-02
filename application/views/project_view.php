	<head>
		<!-- Title here -->
	<title><?php $title; ?></title>
    <?php echo $map['js']; ?>
		<!-- Description, Keywords and Author -->
		<link rel="shortcut icon" href="#">
    <style type="text/css">
    .sidey{
      height: 475px;
      margin-top: 10px;
    }
    .filter{
      line-height: 30px;
      cursor: pointer;
      padding: 2%;
      border: 1px solid #5bc0de;
      list-style-type: none;
      margin-top: 2%;
      width: 100%;
      height: 40px;
      color: #60c560;
      border-radius: 5px;
    }
    .filter-nav{
      margin: 0px;
      padding: 0px;
    }
    input[type="checkbox"]{
      cursor: pointer;
    }
    .filter i{
      margin-right: 6%;
    }
    .filter:hover{
      background: #5bc0de;
      color: #fff;      
    }
    .active{
      background: #5bc0de;
      color: #fff;
    }
    .top-nav{
      width: 480px;
      height: 60px;
      margin-right: auto;
      margin-left: auto;
      margin-bottom: 3%;
    }
    .nav-main{
      list-style-type: none;
      float: left;
      background: #333;
      width: 240px;
      height: 60px;
      text-align: center;
      line-height: 20px;
      color: #fff;
      border-radius: 10px;
    }
    .active{
      background: #16cbe6;
    }
    </style>
	</head>
	
	<body>      
      <!-- Logo & Navigation starts -->
      
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="index.html">County Eye</a></h1>
                  </div>
               </div>
               <div class="col-md-3">

               </div>
               <div class="col-md-6">
                  <div class="navbar navbar-inverse" role="banner">
                      <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                          <span>Menu</span>
                        </button>
                      </div>
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                              <li><a href="<?php echo ('login') ?>">Log In</a></li>
                              <li><a href="<?php echo ('register') ?>">Register</a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <!-- Logo & Navigation ends -->
     
      <!-- Page content -->
      
      <div class="page-content blocky">
         <div class="container">
                  <div class="top-nav">
                      <a href="#"><li class="nav-main active"><h5><i class="icon-map-marker"></i></h5>Mapped Projects</li></a>
                      <a href="#"><li class="nav-main"><h5><i class="icon-signal"></i></h5>View Analytics</li></a>
                  </div><!--end top-nav-->
                  <div class="sidebar-dropdown"><a href="#">MENU</a></div>
                  <div class="page-title">
                        <h2><small><p> <?php echo $records; ?> Projects Found For <b><?php echo $county ?></p></b></small></h2> 
                        <hr>
                     </div>
                  <div class="sidey">
                    <div class="side-cont">
                        <ul class="nav">
                            <!-- Main menu -->
                            <li class="current" style="text-align:center"><a href="index.html"><i class="icon-refresh"></i> Refine Search</a></li>
                            <li></li>
                        </ul>
                        <ul class="filter-nav">
                            <li class="filter"><i class="icon-book"></i>Education</li>
                            <li class="filter"><i class="icon-exclamation-sign"></i>Security</li>
                            <li class="filter"><i class="icon-stethoscope"></i>Health</li>
                            <li class="filter"><i class="icon-leaf"></i>Agriculture</li>
                            <li class="filter"><i class="icon-road"></i>Roads/Bridges</li>
                            <li class="filter"><i class="icon-cloud"></i>Water</li>
                        </ul>
                     </div>
                  </div>
                      <div class="mainy">                             
                           <div class="row">
                             <div class="col-md-12">
                                    <div class="awidget">
                                      <div class="awidget-body " style="height:460px; width:100%; padding:0px;">
                                        <?php echo $map['html']; ?>
                                      </div>
                                    </div>
                              </div>
                           </div>
                     </div>
            
            <div class="clearfix"></div>
            
         </div>
      </div>