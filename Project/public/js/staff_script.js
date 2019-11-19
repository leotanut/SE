$(document).ready(function(){
  $(".btn-del").click(function(){

    var info = JSON.parse($(this).val());
    
    $("#show_name").html( info.fname+" "+info.lname );
    $("#show_username").html( info.username );
    $("#show_role").html( info.role );
  	$("#key").val( info.staff_id );

    $(".popup-wrapper").show();
    $(".confirm-popup").show();
  });

  $(".popup-wrapper").click(function(){
    $(".popup-wrapper").hide();
    $(".confirm-popup").hide();
    $(".search-popup").hide();
  });

  $(".btn-cancel").click(function(){
    $(".popup-wrapper").hide();
    $(".confirm-popup").hide();
  });

  $(".btn-to-search").click(function(){
    $(".popup-wrapper").show();
    $(".search-popup").show();
  });

  $("#search-cancel").click(function(){
    $(".popup-wrapper").hide();
    $(".search-popup").hide();
  });

  $('.select-search').change(function(){ 
    if($(this).val()=="role"){
      $(".data-search").hide();
      $(".select-search-role").show();
    }
    else{
      $(".select-search-role").hide();
      $(".data-search").show();
    }
  });

  

  if($("#no-data").css('display')=="block"){
      $("#reload").click(function(){
        window.location.href = "/admin_management";
      });
  }
});