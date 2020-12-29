(function($) {
  'use strict';
  $(function() {
    $(".nav-settings").on("click", function() {
      $("#right-sidebar").toggleClass("open");
    });
    $(".settings-close").on("click", function() {
      $("#right-sidebar,#theme-settings").removeClass("open");
    });

    $("#settings-trigger").on("click" , function(){
      $("#theme-settings").toggleClass("open");
    });


    //background constants
    var sidebar_classes = "sidebar-danger sidebar-success sidebar-warning sidebar-dark sidebar-light sidebar-primary sidebar-info sidebar-pink";
    var $body = $("body");


    //Sidebar Backgrounds
    $(".tiles.primary").on("click" , function(){
      $(".sidebar").removeClass(sidebar_classes);
      $(".sidebar").addClass("sidebar-primary");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.success").on("click" , function(){
      $(".sidebar").removeClass(sidebar_classes);
      $(".sidebar").addClass("sidebar-success");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.warning").on("click" , function(){
      $(".sidebar").removeClass(sidebar_classes);
      $(".sidebar").addClass("sidebar-warning");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.danger").on("click" , function(){
      $(".sidebar").removeClass(sidebar_classes);
      $(".sidebar").addClass("sidebar-danger");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.light").on("click" , function(){
      $(".sidebar").removeClass(sidebar_classes);
      $(".sidebar").addClass("sidebar-light");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.info").on("click" , function(){
      $(".sidebar").removeClass(sidebar_classes);
      $(".sidebar").addClass("sidebar-info");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.dark").on("click" , function(){
      $(".sidebar").removeClass(sidebar_classes);
      $(".sidebar").addClass("sidebar-dark");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.default").on("click" , function(){
      $(".sidebar").removeClass(sidebar_classes);
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
  });
})(jQuery);
