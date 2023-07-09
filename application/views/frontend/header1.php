<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
	<!-- Your Basic Site Informations -->
	<title>Paket wisata Desa wisata Lerep</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="description" content="<?php //echo $metadest;?>" />
    <meta name="keywords" content="<?php //echo $metakey;?>" />
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
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="<?=base_url('assets/fancybox/jquery.fancybox.css');?>" />
        <link rel="stylesheet" href="<?=base_url('assets/css/datepicker.min.css');?>" />

        <!-- text fonts -->
        <link rel="stylesheet" href="<?=base_url();?>assets/fonts/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?=base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    
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
  
  <nav id="main-navigation" class="clearfix">
   <ul>
   <?php
    $main=$this->db->get_where('navigations',array('parent'=>0,'published'=>'Y','type'=>'F'));
    foreach ($main->result() as $m)
    {
        // chek ada submenu atau tidak
        $sub=$this->db->get_where('navigations',array('parent'=>$m->id));
        if($sub->num_rows() >0)
        {
            // buat menu + sub menu
            echo '<li>
                            <a href="'.$m->link.'">'.strtoupper($m->name).'
                            <i class="arrow-main-nav"></i>
                            </a>';
            echo "<ul>";
            foreach ($sub->result() as $s)
            {
                 echo '<li>
                            <a href="'.base_url($s->link).'">'.strtoupper($s->name).'</a>
                       </li>';
            }
            echo "</ul>";
            echo "</li>";
        }
        else
        {
             echo '<li>
                    <a href="'.base_url($m->link).'">'.strtoupper($m->name).'</a>
                   </li>';
        }
    }
?>
   </ul>
  </nav> <!-- End Main-Navigation -->