(function( $ ){

$(window).scroll(function() {        
    var scroll = $(window).scrollTop();    
    if (scroll >= 68.8) {
       $("#mainnav").addClass("navbar-shrink");    
    }else{
       $("#mainnav").removeClass("navbar-shrink");
    }
});

$(document).ready(function(){
  $(".menuitem").hover(function(){
    $(".submenu").addClass("d-block");
    }, function(){
      $(".submenu").removeClass("d-block");
    });
});

$('.menu-item a').click(function(){
    
    $(".collapse").click();
    
})

  // menu principal
$("#btn_menu").on('click', function(e) {
    $(".collapse").toggleClass("toggled");
    if ($(".collapse").hasClass("toggled")) {
      $('.collapse').collapse('hide');
    };
  });


    
})(jQuery);