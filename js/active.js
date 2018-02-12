jQuery(document).ready(function($) {
  $(".nav-link").on("click", function(){
     $(".nav-item").find(".active").removeClass("active");
     $(this).parent().addClass("active");
  })
});
