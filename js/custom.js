
  $(function(){
     $(".ask-for-information").click(function(){
        $(".ask-info").toggle();
     });

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
    $(".register").click(function()
    {      
      $(".registration-form").text("Sinu kasutaja on edukalt registreeritud");
    })
    $(".add-car").click(function(){
        $(".car").hide();
        $(".data-input-table table").find("input").each(function(){
          if(!$(this).val()){
            $(this).attr("placeholder","Sisesta info");
          }
        })    
      
    });

    $(".my-querys").click(function(){
     $(".l-seaded").toggle(false);
      $(."l-car").toggle(false);
      $(".l-querys").toggle(true);
    });

    $(".change-settings").click(function(){
      $(".l-seaded").toggle(true);
      $(."l-car").toggle(false);
      $(".l-querys").toggle(false);
    });

    $(".change-car").click(function(){
        $(".car").toggle();

        $(".data-input-table table").find("input").each(function(){
          if(!$(this).val()){
            $(this).attr("placeholder","bla bla");
          }
        })

    });
    
    $(".object").click(function(){
      var url= document.URL;
      console.log(url);
      window.location = url + "object.php";
    });

    

      });
