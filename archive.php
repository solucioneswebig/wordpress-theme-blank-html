<?php
get_header();

    $url_image = get_the_post_thumbnail_url();

    if(!$url_image){
    $fondo = "background: #000 !important;";
    }else{
      $fondo = "background-image: url(".$url_image.") !important;";
    }
    

?>
    <!-- PAGINA ARCHIVE.PHP -->
  <!-- Header -->
  <header class="fondo-blog" style="<?php echo $fondo; ?>">
    <div class="transparente" style="background-color: #00000080;">
    <div class="container">
      <div class="row justify-content-center">
      <div class="col-md-10">

      <div class="intro-text">
        <h1 class="titulo-blog text-center pb-5">Blog</h1>
      </div>
      
      </div>
      </div>

    </div>
    </div>
  </header>


  <!--====SECCION N°1===-->
  <section class="bg-white" id="portfolio">
    <div class="espacio-arriba-p espacio-bottom-p">
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-9">
      	<div class="row">
      
<?php
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
?>
   
 
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" href="<?php echo get_permalink(); ?>">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""> 
          </a>
          <div class="portfolio-caption">
            <small class="text-uppercase"><?php echo  get_the_date( 'F').", ".get_the_date( 'Y'); ?></small>
            <a class="color-a" href="<?php echo get_permalink(); ?>"><h4 class="py-1 text-uppercase"><?php echo apply_filters( 'the_title', wp_trim_words( get_the_title(), 4, '&hellip;' ) ); ?></h4></a>
            <p class="pt-2"><?php echo apply_filters( 'the_content', wp_trim_words( get_the_content(), 15, '&hellip;' ) ); ?></p>
            <a class="text-left color-a linea" href="<?php echo get_permalink(); ?>">Leer más</a>
          </div>
        </div>
<?php
   // the_content();
    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;

?>
</div>
</div>

<div class="col-md-3">
	<?php get_sidebar(); ?>

</div>


      </div>
    </div>
    </div>
  </section>

<?php

get_footer();
?>