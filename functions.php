<?php

function wp_theme_main_style(){
  wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css',false);
  wp_enqueue_style('fontawesome',get_template_directory_uri().'/assets/fontawesome/css/all.min.css',false);

  wp_enqueue_style('owlcarousel-css',get_template_directory_uri().'/assets/owlcarousel/assets/owl.carousel.min.css',false);

  wp_enqueue_style('litbox-css',get_template_directory_uri().'/assets/lightbox/css/lightbox.min.css',false);

  wp_enqueue_style('animate-css',get_template_directory_uri().'/assets/animate/animate.min.css',false);

  wp_enqueue_style('style-css',get_template_directory_uri().'/assets/css/style.css',false);
  wp_enqueue_style('style5-css',get_template_directory_uri().'/assets/css/style5.css',false);

  //wp_enqueue_style('responsive-css',get_template_directory_uri().'/css/responsive.css',false);
  //wp_enqueue_style('fonts-googles','https://use.fontawesome.com/releases/v5.3.1/css/all.css',false);

}




add_action('wp_enqueue_scripts','wp_theme_main_style');


// Load WP jQuery
function insert_jquery(){
  wp_enqueue_script('jquery');
  
  wp_enqueue_script( 'bootstrap-min-js',get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js' , array('jquery'), '4.3.1', true );


  wp_enqueue_script( 'wow-js',get_template_directory_uri().'/assets/wow/wow.min.js' , array('jquery'), '4.3.1', true );


  wp_enqueue_script( 'owlcarousel-js',get_template_directory_uri().'/assets/owlcarousel/owl.carousel.min.js' , array('jquery'), '4.3.1', true );

  wp_enqueue_script( 'lightbox-js',get_template_directory_uri().'/assets/lightbox/js/lightbox.min.js' , array('jquery'), '4.3.1', true );

  
  wp_enqueue_script( 'typed-min-js', get_template_directory_uri().'/assets/js/typed.min.js', array('jquery'), '1.0.0', true );

  wp_enqueue_script( 'script-js', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0.0', true );

  //wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri().'/js/owl.carousel.js', array('jquery'), '1.0.0', true );

}
add_action('init','insert_jquery');



// Register Custom Navigation Walker
//require_once('wp_bootstrap_navwalker.php');

//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );

//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}

// Enable post thumbnails
add_theme_support('post-thumbnails');

//Some simple code for our widget-enabled sidebar
if ( function_exists('register_sidebar') ){
  $sidebar1 = array(
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',        
    'name' => __( 'Sidebar principal', 'textdomain' ),  
    'id'            => "sidebar-principal",
  );  
  register_sidebar($sidebar1);
}
    


//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

/*Función paginación página testimonios*/
function custom_pagination($numpages = '', $pagerange = '', $paged='') {
 
  if (empty($pagerange)) {
    $pagerange = 2;
  }
 
  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }
 
  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );
 
  $paginate_links = paginate_links($pagination_args);
 
  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }
 
}

/**
 * Crear nuestros menús gestionables desde el
 * administrador de Wordpress.
 */

function mis_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Menú de navegación' ),
    )
  );
}
add_action( 'init', 'mis_menus' );


/*
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}
*/