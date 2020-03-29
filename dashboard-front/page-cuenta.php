<?php
/*
Template Name: Pagina cuenta
*/
wp_head();
?>
<!-- CONTENIDO INICIO -->

<?php

include "includes/head.php";

?>
<!-- PAGINA PAGE-CUENTA.PHP -->

<div class="wrapper">
  <?php include "includes/menu-side.php"; ?>

  <!-- Page Content Holder -->
  <div id="content">

    <?php include "includes/menu-top.php"; ?>

    <div class="content-wrapper">


    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <?php 
          if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
          
          the_content(); 
          
            endwhile;
            endif;
         
          ?>
        </div>
      </div>
    </div>




    </div>



  </div>
</div>
<?php wp_footer(); ?>