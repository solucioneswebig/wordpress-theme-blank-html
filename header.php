<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
<nav id="mainnav" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
<div class="container">
  <a class="navbar-brand js-scroll-trigger" href="#page-top">
    <?php 
      if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
       }

      $custom_logo_id = get_theme_mod( 'custom-logo' );
      $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

      
      if ( has_custom_logo() ) {
        echo '<img src="' . esc_url( $logo ) . '">';
      } else {
              echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
      }
    ?>
  </a>
  <button id="btn_menu" class="navbar-toggler collapse" type="button">  
      <span class="menu_icons"></span>
  </button>

 


      <?php 
      
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_class'   => "collapse navbar-collapse", 
        'container_id'     => "navbarResponsive",
        'items_wrap'  => '<ul class="navbar-nav text-uppercase ml-auto"><li class="nav-item" id="item-id"><?php __( "Menu:", "textdomain" ); ?></li>%3$s</ul>',
        //'walker' => new IBenic_Walker
      ));

      ?>

</div>
</nav>
