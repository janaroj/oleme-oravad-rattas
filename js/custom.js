  function GetLocalhost(){
    var hostname = window.location.host;
    if(hostname == "localhost"){
      return("/oleme-oravad-rattas/")
    }
    else if(hostname =="localhost:81"){
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


    $(".small-image img").click(function(){
      var img = $('<img>');
      $('.big-image img').hide();
      img.attr('src',  $(this).attr('src'));
      img.hide().appendTo('.big-image').fadeIn(500);
    });
    

    //END


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
