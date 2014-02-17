
  $(function(){
    $(".more-details").click(function(){
      $(".detail-search").slideToggle();
      if($(this).text() == "Rohkem detaile"){
        $(this).text("Vähem detaile");
      }
      else{
        $(this).text("Rohkem detaile");
      }
    });
    $(".login-toggle").click(function(){
      $(".login-field").slideToggle();
    });
    $(".small-image img").click(function(){
      var img = $('<img>');
      $('.big-image img').hide();
      img.attr('src',  $(this).attr('src'));
      img.hide().appendTo('.big-image').fadeIn(500);
    });

  });
