<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/camera.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/camera.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.ui.totop.js" type="text/javascript"></script>
	<script>
      $(document).ready(function(){   
              jQuery('.camera_wrap').camera();
        });    
	</script>		
	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
  
  <!--[if (gt IE 9)|!(IE)]><!-->
  <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
  <!--<![endif]-->
  	<!--[if lt IE 9]>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/docs.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
  <![endif]-->
</head>

<body>
<!--==============================header=================================-->
<header class="p0">
    <div class="container">
    	<div class="row">
        	<div class="span12">
            	<div class="header-block clearfix">
                    <div class="clearfix header-block-pad">
                        <form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="navbar" >
                            <a href="<?php echo base_url()?>login" class="btn btn_">Login</a>
                            <a href="<?php echo base_url()?>register" class="btn btn_">Register</a>
                        </form>
                    </div>
                    <div class="navbar navbar_ clearfix">
                        <div class="navbar-inner navbar-inner_">
                            <div class="container">
                                <div class="nav-collapse nav-collapse_ collapse">
                                    <ul class="nav sf-menu">
                                      <li class="active sub-menu"><a href="<?php echo base_url()?>berita/home">Home</span></a></li>
                                      <li class="active sub-menu"><a href="<?php echo base_url()?>
                                        jadwal">Jadwal</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                     </div>   
                </div>
            </div>
         </div>   
    </div>
    <div class="slider">
    <div class="camera_wrap">
        <div data-src="img/slide1.jpg"></div>
        <div data-src="img/slide2.jpg"></div>
        <div data-src="img/slide3.jpg"></div>
    </div>
</div>
</header>