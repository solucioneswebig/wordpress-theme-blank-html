<?php
get_header();
 
if ( have_posts() ) : 
while ( have_posts() ) : the_post();

$url_image = get_the_post_thumbnail_url();

if(!$url_image){
  $fondo = "background: #343a40 !important;";
}else{
  $fondo = "background-image: url(".$url_image.") !important;";
}
    

?> 
<!-- PAGINA PAGE.PHP -->

 <header class="fondo-blog-interna" style="<?php echo $fondo; ?>">
    <div class="transparente">
    <div class="container">
      <div class="row justify-content-center">
      <div class="col-md-10 m-auto">
      <div class="intro-text">
        <h1 class="titulo-blog-interna text-center pb-5"><?php echo the_title(); ?></h1>
      </div>
      </div>
      </div>
    </div>
    </div>
  </header> 

<section style="padding:120px 0px 80px 0px;">

	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php the_content(); ?>
			</div>
			<div class="col-md-3">
				<?php get_sidebar('sidebar-principal'); ?>
			</div>
		</div>
	</div>

</section>	
        

<?php
	endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
 

get_footer();
?>