<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Invoice Generator | </title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url(); ?>public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="<?php echo base_url(); ?>public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="<?php echo base_url(); ?>public/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- iCheck -->
      <link href="<?php echo base_url(); ?>public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="<?php echo base_url(); ?>public/build/css/custom.min.css" rel="stylesheet">
   </head>
   <body class="nav-md">
      <div class="container body">
      <div class="main_container">
      <div class="col-md-3 left_col">
         <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
               <a href="index.html" class="site_title"> <span><?php echo date("Y-m-d"); ?></span></a>
            </div>
         </div>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
            <div class="nav toggle">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
            </nav>
         </div>
      </div>
      <!-- /top navigation -->