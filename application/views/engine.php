<!--DOCTYPE HTML-->
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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
        pre{
            font-family: "Anonymous Pro", "Menlo", "Consolas", "Bitstream Vera Sans Mono", "Courier New", monospace;
            padding: 10px;
            font-size: 0.9em;
            max-height: 400px;
            overflow-y: auto;
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
                <?php
                if($jina){
                    echo $jina;
                }
                else{
                    echo ('Guest');
                }
                ?>
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

        <li>
            <a href="#">
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
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
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
                    <span class="number" style="font-size: 16px">Sentimental Analysis Engine</span>
                </div>
                <span class="date">PHP IR</span>
            </div>
        </div><!--  end row stats-->
    </div>
    <div class="row" style="background: #fafafa; margin: auto; margin-top: 0; padding: 2%; padding-top: 4%; border-radius: 5px; width: 100%;">
        <div class="col-mod-6 padded" style=" ">
            <form action="#" class="form-horizontal padded" method="post">
                <div class="input-group form col-md-8">
<!--                    <input type="text" class="form-control"/><span class="input-group-btn"><input class="btn btn-success" id="senti" type="button" value="POST"></span>-->
                    <textarea class="form-control" name="sentiment" cols="10" rows="5"></textarea>
                    <br/><br/>
                    <button class="btn btn-info" id="senti" type="button" value="Submit"><i class="icon-cog"></i> Analyze</button> &nbsp
                    <button class="btn btn-success" type="reset"><i class="icon-pencil"></i> Clear</button>
                </div>
            </form>
        </div>
    </div>
        <div class="col-md-12" style="margin-top: 4%;">
            <div class="panel panel-default" style="width:50%;margin-left: auto; margin-right: auto">
                <div class="panel-heading"> Sentiment Payload</div>
                <div class="panel-body"">
<pre>
<code id="sentiment" style="color: red">

</code>
</pre>
                </div>
            </div>
    </div>

    <!-- /tabs -->
</div>

<!-- end main-stats-->

</div>
<!-- end main container -->



</body>