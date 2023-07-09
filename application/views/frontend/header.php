<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
	<!-- Your Basic Site Informations -->
	<title><?php echo $metatittle;?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="description" content="<?php echo $metadest;?>" />
    <meta name="keywords" content="<?php echo $metakey;?>" />
    <meta name="author" content="Depri Pramana" />
    
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/bootstrap-responsive.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/flexslider.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/prettyPhoto.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/style.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/css/theme-layout.css');?>">
    <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/colorbox.css"/>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox-min.js"></script>
    
    <noscript><link rel="stylesheet" href="<?=base_url('assets/frontend/css/no-js.css');?>"></noscript> <!-- If JavaScript Disabled -->
    
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <!-- Favicons -->
	<link rel="shortcut icon" href="<?=base_url('assets/frontend/images/logo_dwl_baru.jpg');?>">
	<link rel="apple-touch-icon" href="<?=base_url('assets/frontend/images/apple-touch-icon.png');?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/frontend/images/apple-touch-icon-72x72.png');?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/frontend/images/apple-touch-icon-114x114.png');?>">
    .
    <!-- JavaScript -->
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery-1.8.3.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.easing.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.flexslider-min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jflickrfeed.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.fitvids.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.lazyload.mini.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.prettyPhoto.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.placeholder.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.jticker.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.mobilemenu.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.isotope.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/jquery.hoverdir.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/modernizr.custom.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/frontend/js/main.js');?>"></script>
    
</head>

<body>

 <div class="theme-layout"> <!-- Stretched/Boxed Layout -->

 <div class="container">
  <header id="header" class="clearfix">
   
   <!-- Logo -->
   <div class="logo pull-left">
    <a href="./"><img src="<?=base_url('assets/frontend/images/logo.jpg');?>" alt="Enews" /></a>
     
   </div>
   
  </header> <!-- End Header -->
  
  <nav id="main-navigation" class="clearfix " >

   <ul>
    <?php $this->load->view($navigation);?>
<li>
    <a href="https://www.youtube.com/channel/UCgRLgw7EzDiqmZeEg9f-Agg/" target="_blank"><img src="<?=base_url('assets/metsos/14.png');?>" width="25px" height="25px" alt="Enews" class="pull-right"/></a>
      <a href="https://web.facebook.com/groups/1448785525358453/?_rdc=1&_rdr/" target="_blank"><img src="<?=base_url('assets/metsos/3666.png');?>" width="25px" height="25px" alt="Enews" class="pull-right" /></a>
       <a href="https://www.instagram.com/desawisatalerep/" target="_blank"><img src="<?=base_url('assets/metsos/is3666.png');?>" width="25px" height="25px" alt="Enews" class="pull-right" /></a></li>
   </ul>
  </nav> <!-- End Main-Navigation -->