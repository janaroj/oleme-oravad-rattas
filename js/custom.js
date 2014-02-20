
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
      $(".l-seaded").hide();
      $(".l-querys").hide();
      $(".l-car").show();

        $(".car").hide();
        $(".data-input-table table").find("input").each(function(){
          if(!$(this).val()){
            $(this).attr("placeholder","Sisesta info");
          }
        })    
     });

    $(".my-querys").click(function(){
       $(".car").hide();
      $(".l-seaded").hide();
      $(".l-car").hide();
      $(".l-querys").show();
    });

    $(".change-settings").click(function(){
       $(".car").hide();
      $(".l-querys").hide();
      $(".l-car").hide();
      $(".l-seaded").show();
    });

    $(".change-car").click(function(){
      $(".l-seaded").hide();
      $(".l-querys").hide();
      $(".l-car").show();
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
