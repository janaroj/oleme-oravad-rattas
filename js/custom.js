  function GetLocalhost(){
    var hostname = window.location.host;
    if(hostname == "localhost"){
      return("/oleme-oravad-rattas/")
    }
    else{
      return("/");
    }
  }


  $(function(){
    $(".data-input-table table").find("input").each(function(){
          if(!$(this).val()){
            $(this).attr("placeholder","Sisesta info");
          }
        });


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
      $(".registration-form").text("Sinu kasutaja on edukalt registreeritud, sind suunatakse sinu konto juurde 3 sekundi jooksul");
      window.setTimeout(function(){window.location = GetLocalhost() + "login.php"},3000)
    })
    $(".add-car").click(function(){
      window.location = GetLocalhost() + "login.php";
      $(".l-car").show();
        $(".car").hide();
     });

    $(".my-querys").click(function(){
      window.location = GetLocalhost() + "querys.php";
    });

    $(".change-settings").click(function(){
      window.location = GetLocalhost() + "settings.php";
    });

    $(".change-car").click(function(){
        window.location = GetLocalhost() + "login.php?a=changecar";
    });

    $(".logout").click(function(){
      window.location = GetLocalhost();
    });
    
    $(".object").click(function(){
      window.location = GetLocalhost() + "object.php";
    });

    $(".l-reset").click(function(){
      location.reload();
    });

    $(".approve-query").click(function(){
      alert("Sinu kontaktandmed on edastatud");
      $(".data-input-table").hide();
    });
    $(".decline-query").click(function(){
      alert("Sa keeldusid päringule vastamast");
      $(".data-input-table").hide();
    });
    $(".cancel").click(function(){
      alert("Muudatused on tühistatud");
      location.reload();
    });
    $(".save-changes").click(function(){
      alert("Muudatused on salvestatud");
      location.reload();
    });



      });
