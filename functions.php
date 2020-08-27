<?php

function wp_theme_main_style(){
  wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css',false);
  wp_enqueue_style('fontawesome',get_template_directory_uri().'/assets/fontawesome/css/all.min.css',false);

  wp_enqueue_style('style-css',get_template_directory_uri().'/assets/css/style.css',false);

}




add_action('wp_enqueue_scripts','wp_theme_main_style');


// Load WP jQuery
function insert_jquery(){
  wp_enqueue_script('jquery');

  wp_enqueue_script( 'lightbox-js',get_template_directory_uri().'/assets/lightbox/js/lightbox.min.js' , array('jquery'), '4.3.1', true );

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

//support for title tag
add_theme_support( 'title-tag' );



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




/**
* Custom walker class.
*/
class IBenic_Walker extends Walker_Nav_Menu {
    
	// Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;

      $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
      	$output .= '<a href="' . $permalink . '">';
      } else {
      	$output .= '<span>';
      }
       
      $output .= $title;

      if( $description != '' && $depth == 0 ) {
      	$output .= '<small class="description">' . $description . '</small>';
      }

      if( $permalink && $permalink != '#' ) {
      	$output .= '</a>';
      } else {
      	$output .= '</span>';
      }
    }
}


add_action( 'wp_head', 'ibenic_walker_style');

add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
  $defaults = array(
  'height'      => 100,
  'width'       => 400,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $defaults );
 }
 add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


function ibenic_walker_style(){
	?>
	<style>
		.menu-item a small {
			font-weight:300;
			color:#999;
			display: block;
		}

		.main-navigation span {
			 outline-offset: -1px;
    		padding: 0.84375em 0;
			 display: block;
    		line-height: 1.3125;
		}

		@media screen and (min-width: 56.875em){
			.main-navigation span {
			    outline-offset: -8px;
			    padding: 0.65625em 0.875em;
			    white-space: nowrap;
			}

			.main-navigation .menu-item-has-children > span {
			  margin: 0;
    		padding-right: 2.25em;
			}
		}
		
	</style>
	<?php
}