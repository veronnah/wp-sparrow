<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" > 

   <?php wp_head(); ?>

</head>

<body>
   <!-- Header
   ================================================== -->
   <header>

      <div class="row">

         <div class="twelve columns">

            <div class="logo">
               <a href="<?php echo home_url();?>">
               <div class=""><?php bloginfo('name'); ?></div>
               <img alt="" src="images/logo.png">
               </a>
            </div>
           
            <nav id="nav-wrap">
                
               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
               
               <?php wp_nav_menu(array(
               'theme_location'  => 'top',
               'container'       => null,
               'menu_class'      => 'nav', 
               'menu_id'         => 'nav'
                )); ?>

            </nav> <!-- end #nav-wrap -->

         </div>

      </div>

   </header> <!-- Header End -->