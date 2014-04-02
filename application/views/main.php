<!--DOCTYPE HTML-->
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>CountyEye: Project View</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
    <?php include 'layout/link_main.php'; ?>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url();?>assets2/css/compiled/index.css" type="text/css" media="screen">
    <style type="text/css">
        .navbar-brand span{
            color:#16cbe6;;
        }
        #p_overall{
            color: #16cbe6;
        }

        .filter{
            line-height: 20px;
            cursor: pointer;
            padding: 5%;
            list-style-type: none;
            margin-top: 2%;
            width: 100%;
            height: 40px;
            border-radius: 5px;
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
        #p_details{
            right: 0px;
            top:30px;
            margin-right: 5%;
            background:#FFF;
            height:auto;
            position: absolute;
            z-index: 99;
            display: none;
            opacity: 0.9;
            box-shadow: 0px 0px 1px 1px #CCC;
        }
        .close{
            font-size: 13px;
            line-height: 1;
        }
        .head{
            height: 35px;
            padding-top: 10px;
            /*background: #333;*/
            width: 100%;
            border-bottom: 1px solid #EAE5ED;
        }
        .ctrls{
            padding: 5%;
        }
        #pad-wrapper{
            padding-bottom: 0px;
        }
        .ttl{
            width: 25%;
            font-weight: bold;
        }
        .nav-tabs > li > a{
            border-radius: 0px;
            color: #71B8EE;
        }
        #err1{
            display:none ;
        }
        .cool{
            background: honeydew;
            width: 100%;
            text-align: center;
            height: auto;
            padding: 2%;
            margin-bottom: 10px;

        }
        #p_id, #p_id_user{
           display: none;
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
               <?php if($jina){ ?>
                   <li><a href="<?php echo ('account'); ?>"> <i class="icon icon-user"></i> Personal info</a></li>
                    <li><a href="<?php echo ('login/logout'); ?>"> <i class="icon icon-signout"></i> Log Out</a></li>
               <?php } else {?>
                   <li><a href="<?php echo ('login'); ?>"> <i class="icon icon-user"></i> Login</a></li>
                   <li><a href="<?php echo ('register'); ?>"> <i class="icon icon-edit"></i> Sign Up</a></li>
               <?php  } ?>
            </ul>
        </li>
    </ul>
</header>
<!-- end navbar -->

<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <a class="dropdown-toggle" href="#">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
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
    </ul>
</div>
<!-- end sidebar -->


<!-- main container -->
<div class="content">
    <div id="main-stats">
        <div class="row stats-row">
            <div class="col-md-3 col-sm-3 stat">
                <div class="data">
                    <span class="number"><?php  echo $records; ?></span>
                    <?php  echo $county ?>
                </div>
                <span class="date">Projects</span>
            </div>
        </div><!--  end row stats-->
    </div>

    <div id="pad-wrapper" style="">
       <div class="row">
            <div class="col-md-12" style="height:500px; width: 100%;">
                <?php echo $map['html']; ?>
                <div id="p_details" class="col-md-5">
                    <div class="head">
                        <p><b>Project Details [ <span id="p_overall"></span> ]</b> <span id="close" class="close">X</span></p>
                    </div>

                    <div class="row ctrls">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home"><i class="icon icon-list-alt"></i> Info</a></li>
                            <li><a href="#profile"><i class="icon icon-money"></i> Costing</a></li>
                            <?php if($jina){ ?>
                            <li><a href="#messages"><i class="icon icon-comment"></i> Comments</a></li>
                            <li><a href="#flags" style="color: red;"><i class="icon icon-flag"></i> Flag</a></li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <br/>
                                <table class="table table-striped" style="font-size: 11px;">
                                    <thead>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ttl">Name</td>
                                            <td id="p_name"></td>
                                        </tr>
                                        <tr>
                                            <td class="ttl">County</td>
                                            <td id="p_county"></td>
                                        </tr>
                                        <tr>
                                            <td class="ttl">Constituency</td>
                                            <td id="p_loc"></td>
                                        </tr>
                                        <tr>
                                            <td class="ttl">Sector</td>
                                            <td id="p_sector"></td>
                                        </tr>
                                        <tr>
                                            <td class="ttl">MTFE_Sector</td>
                                            <td id="p_sector_two"></td>
                                        </tr>
                                        <tr>
                                            <td class="ttl">Tasks</td>
                                            <td  id="p_tasks"></td>
                                        </tr>
                                        <tr>
                                            <td class="ttl">Expect. Output</td>
                                            <td id="p_output"></td>
                                        </tr>
                                        <tr>
                                            <td class="ttl">Status</td>
                                            <td  id="p_status"></td>
                                        </tr>
                                        <tr>
                                            <td class="ttl">Remarks</td>
                                            <td  id="p_remarks"></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane" id="profile">
                                <br/>
                                <table class="table table-striped" style="font-size: 11px;">
                                    <tr>
                                        <td>Estimated Total Cost</td>
                                        <td id="p_estimate"></td>
                                    </tr>
                                </table>
                                <!--budget chart holder-->
                                <div class="chart_canvas" id="chart_canvas" style="width: 454px; height: 300px;">


                                </div>
                            </div>

                            <?php if($jina){?>
                            <div class="tab-pane" id="messages">
                                <br/>
                                <div class="col-md-12">
                                    <div id="feeds">

                                    </div>

                                    <form action="#">
                                        <input name="id" id="p_id" type="text"/>
                                        <input name="user" id="p_id_user" type="text"/>
                                        <p id="err1" style="color: red">*please input a comment</p>
                                        <label>Comment:</label>
                                        <br/>
                                        <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Give a comment on the project"></textarea>
                                        <br/>
                                        <a id="comment_btn" class="btn-flat gray">Comment</a>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="flags">
                                <br/>
                                <div class="col-md-12">
                                    <div class="field-box">
                                        <form action="" method="post">
                                        <label>Report For:</label>
                                            <br/>
                                        <label class="checkbox-inline">
                                            <div class="checker" id="uniform-inlineCheckbox1"><span class="checked"><input type="checkbox" id="inlineCheckbox1" value="option1"></span></div> Misappropriation
                                        </label>
                                        <label class="checkbox-inline">
                                            <div class="checker" id="uniform-inlineCheckbox2"><span class="checked"><input type="checkbox" id="inlineCheckbox2" value="option1"></span></div> Corruption
                                        </label>
                                    </div>
                                </div>
                                <br/>
                                <div class="col-mod-12">
                                    <div class="field-box">
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="4" placeholder="Give a reason for flagging this project"></textarea>
                                            <br/>
                                            <a class="btn-flat gray">Report</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <?php }?>
                            <!--end flag div-->
                        </div>
                    </div>
                </div>
            </div>

       </div>

    </div>

</div>
<!-- end main container -->
</body>

