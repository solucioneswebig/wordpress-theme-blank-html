<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav text-uppercase ml-auto">
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#services">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#about">Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#team">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
      </li>
    </ul>
  </div>
</div>
</nav>
