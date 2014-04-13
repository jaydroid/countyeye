<!--DOCTYPE HTML-->
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title><?php echo $title; ?></title>
    <?php include 'layout/link_main.php'; ?>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url();?>assets2/css/compiled/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url();?>assets2/css/compiled/grids.css" type="text/css" media="screen">
    <style type="text/css">
        .navbar-brand span{
            color:#16cbe6;
        }
        .filter{
            line-height: 20px;
            cursor: pointer;
            padding: 5%;
            list-style-type: none;
            margin-top: 2%;
            width: 100%;
            height: 40px;
            /*border-radius: 5px;*/
        }
        input[type="checkbox"]{
            cursor: pointer;
        }
        .filter i{
            margin-right: 6%;
            font-size: 18px;
        }
        .filter:hover{
            color: #fff;
        }
        #pad-wrapper {
            padding: 10px 40px;
        }
        .nav-tabs > li > a{
            border-radius: 0px;
            color: #71B8EE;
        }
    </style>
</head>


<body class="" style="">

<!-- navbar -->
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
    <ul class="nav navbar-nav pull-right hidden-xs">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                Welcome Guest
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href=""> <i class="icon icon-user"></i> Personal info</a></li>
                <li><a href=""> <i class="icon icon-signout"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- end navbar -->

<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li>
            <a class="dropdown-toggle" href="#" onclick="window.history.back()">
                <i class="icon-map-marker"></i>
                <span>Map Filters</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu" style="display: block;">
                <li id="one"  class="filter" style="border: 1px solid limegreen; color: limegreen;"><img src="<?php echo base_url(); ?>assets2/img/1.png" alt="img"/> Education</li>
                <li id="two" class="filter" style="border: 1px solid deeppink; color: deeppink;"><img src="<?php echo base_url(); ?>assets2/img/2.png" alt="img"/> Water</li>
                <li id="three" class="filter" style="border: 1px solid #3dd; color: #3dd;"><img src="<?php echo base_url(); ?>assets2/img/3.png" alt="img"/> Health</li>
                <li id="four" class="filter" style="border: 1px solid forestgreen; color: forestgreen; "><img src="<?php echo base_url(); ?>assets2/img/4.png" alt="img"/> Agriculture</li>
                <li id="five" class="filter" style="border: 1px solid deeppink; color: deeppink;"><img src="<?php echo base_url(); ?>assets2/img/5.png" alt="img"/> Roads/Brg</li>
                <li id="nine" class="filter" style="border: 1px solid dodgerblue; color: dodgerblue;"><img src="<?php echo base_url(); ?>assets2/img/6.png" alt="img"/> Other</li>
            </ul>
        </li>

        <li class="active">
            <a href="#">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <i class="icon-signal"></i>
                <span>Analytics</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ('data'); ?>">
                <i class="icon-hdd"></i>
                <span>App Data</span>
            </a>
        </li>
    </ul>
</div>
<!-- end sidebar -->


<!-- main container -->
<div class="content">
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-5 col-sm-3 stat">
                    <div class="data">
                        <span class="number" style="font-size: 16px">PROJECT ANALYTICS PAGE</span>
                    </div>
                    <span class="date">Visualize Project Data</span>
                </div>
            </div><!--  end row stats-->
        </div>
        <div class="row" style="background: #fafafa; margin: auto; margin-top: 2%; padding: 2%; border-radius: 5px; width: 60%;">
            <div class="col-mod-6 padded" style=" ">
                <form action="#" class="form-horizontal padded" method="post">
                    <div class="input-group form">
                        <select id="county" name="county" class="form-control">
                            <?php foreach ($county as $row){?>
                                <option  value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
                            <?php } ?>
                        </select><span class="input-group-btn"><input class="btn btn-info" id="visualize_one" type="button" value="Visualize"></span>

                        <!--                        <span class="input-group-btn"><input class="btn btn-info"  value="Visualize"></span>-->
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12 padded">
            <br/><br/><br/>
            <!-- tabs left -->
            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#a" data-toggle="tab"><i class="icon icon-tags"></i> Sectors</a></li>
                    <li><a href="#b" data-toggle="tab"><i class="icon icon-list"></i> MTFE Sector</a></li>
                    <li><a href="#c" data-toggle="tab"><i class="icon icon-money"></i> Project Budgets</a></li>
                    <li><a href="#d" data-toggle="tab"><i class="icon icon-time"></i> Projects Status</a></li>
                    <li><a href="#e" data-toggle="tab"><i class="icon icon-tasks"></i> Projects per county</a></li>
                    <li><a href="#f" data-toggle="tab"><i class="icon icon-money"></i> Budgeting</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="a">
                        <div id="sector_pie" class="col-md-9" style="min-width: 310px; height: 400px; margin: 0 auto">

                        </div>
                    </div>
                    <div class="tab-pane" id="b">
                        <div class="col-md-8" id="mtfe_pie" class="col-md-9" style="min-width: 310px; height: 400px; margin: 0 auto">

                        </div>
                    </div>
                    <div class="tab-pane" id="c">
                        <div class="col-md-8" id="budget_chart">

                        </div>
                    </div>
                    <div class="tab-pane" id="d">
                        <div class="col-md-6">
                            Project Status
                        </div>
                    </div>
                    <div class="tab-pane" id="e">
                        <div class="col-md-6" id="county_projects"  style="min-width: 600px; height: 1000px; margin: 0 auto" >

                        </div>
                    </div>

                    <div class="tab-pane" id="f">
                        <div class="col-md-6" id="project_budgets"  style="min-width: 310px; height: 400px; margin: 0 auto" >

                        </div>
                    </div>

                </div>
            </div>
            <!-- /tabs -->

        </div>

   <!-- end main-stats-->
</div>
<!-- end main container -->



</body>