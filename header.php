<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
 </head>
<!--==========================
Header
============================-->
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
<div class="container">
  <a class="navbar-brand js-scroll-trigger" href="#page-top">Logo<!--<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="" width="120px">--></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
    <i class="fas fa-bars"></i>
  </button>

 


      <?php 
      
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_class'   => "collapse navbar-collapse", 
        'container_id'     => "navbarResponsive",
        'items_wrap'  => '<ul class="navbar-nav text-uppercase ml-auto"><li class="nav-item" id="item-id"><?php __( "Menu:", "textdomain" ); ?></li>%3$s</ul>',
        'walker' => new IBenic_Walker
      ));

      ?>

</div>
</nav>
