<?php 
get_header();
?>
<!-- PAGINA 404.PHP -->
<header class="fondo-blog-interna" style="background-color: #000;">
  <div class="transparente" style="background-color: #00000080;">
  <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10 m-auto">
    <div class="intro-text">
      <h1 class="text-center title-encontrada py-5">404</h1>
    </div>
    </div>
    </div>
  </div>
  </div>
</header>

<section class="cuerpo">
    <div class="container">
        <div class="row justify-content-center" style="height: auto;">
            <div class="col-md-12 diseno text-center">
                <h2 class="text-center pt-5" style="font-size: 45px !important">PAGINA NO ENCONTRADA</h2>
                <a href="<?php echo get_site_url(); ?>" class="pb-5 btn boton-encontrada">IR AL HOME</a>
            </div>
        </div>
    </div>
</section>

<?php 
get_footer();
?>