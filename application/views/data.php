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
            /*border: 2px solid #71B8EE;*/
            color: #fff;
            background: #71B8EE;
        }
        .padded{
            margin-left: 15%;
        }
        .tab-pane{
            padding-top: 2%;
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
            <a class="dropdown-toggle" href="<?php echo ('search'); ?>">
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

        <li>
            <a href="<?php echo ('analytics'); ?>">
                <i class="icon-signal"></i>
                <span>Analytics</span>
            </a>
        </li>
        <li  class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="<?php echo ('data'); ?>">
                <i class="icon-hdd"></i>
                <span>App Data</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ('engine'); ?>">
                <i class="icon-cogs"></i>
                <span>IR Engine</span>
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
                    <span class="number" style="font-size: 16px">APPLICATION DATA PAGE</span>
                </div>
                <span class="date">See App Data</span>
            </div>
        </div><!--  end row stats-->
    </div>
    <!-- end main-stats-->
    <div class="row" style="background: #fafafa; margin: auto; margin-top: 0; padding: 2%; padding-top: 4%; border-radius: 5px; width: 100%;">
        <div class="col-mod-6 padded" style=" ">
            <form action="#" class="form-horizontal padded" method="post">
                <div class="input-group form col-md-8">
                    <select id="county" name="county" class="form-control">
                        <?php foreach ($county as $row){?>
                            <option  value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
                        <?php } ?>
                    </select><span class="input-group-btn"><input class="btn btn-info" id="visualize_two" type="button" value="Visualize"></span>

                </div>
            </form>
        </div>
    </div>
    <div class="col-mod-12 padded" style="padding: 2%;">
        <br/> <br/>
        <div class="tabbable tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#a" data-toggle="tab"><i class="icon icon-tags"></i> County Sentiments</a></li>
                <li><a href="#b" data-toggle="tab"><i class="icon icon-list"></i> Flagged Projects</a></li>
                <li><a href="#c" data-toggle="tab"><i class="icon icon-hdd"></i>  Downloads</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="a">
                    <div id="senti_pie" class="col-md-9" style="min-width: 310px; height: 400px; margin: 0 auto">

                    </div>
                    <div id="comments"></div>
                </div>
                <div class="tab-pane active" id="b">
                    <div id="flags"></div>

                </div>
                <div class="tab-pane active" id="c">
                    <div id="sector_pie" class="col-md-9" style="min-width: 310px; height: 400px; margin: 0 auto">

                    </div>
                </div>

            </div>

        </div>
    </div>

<!-- end main container -->

</body>