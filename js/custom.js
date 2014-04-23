  $(function(){
    //Hide search when JS loads
    $(".detail-search").hide();
    
    //Search slide toggle
    $(".more-details").click(function(){
      
      $(".detail-search").slideToggle();
     
      if($(this).text() == "Rohkem detaile"){
        $(this).text("Vähem detaile");
      }
      else{
        $(this).text("Rohkem detaile");
      }
    });

    $(".open-search").click(function(){
      $(".search-box").toggle();
    });
    
    $(".data-input-table table").find("input").each(function(){
          if(!$(this).val()){
            $(this).attr("placeholder","Sisesta info");
          }
        });


    $(".ask-for-information").click(function(){
        $(".ask-info").toggle();
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

      $("#stayOnline").click(function(){
      $(".modalDialog").fadeTo("fast",0.0);
      $(".modalDialog").css( "pointer-events", "none" ); 
      $(".timer").countdown("destroy");
    });

    $(".del-user").click(function(){

    });   

    //AJAX object page ask for information
    $('.ask-info form input[type=submit]').click(function(e) {
      e.preventDefault();
        var item = {
        carId: $('#car_id').val(),
        name:  $('#Requests_name').val(),
        email: $('#Requests_email').val(),
        phone: $('#Requests_phone').val(),
        text: $('#Requests_text').val() 
      }

      $.ajax({
        url: '/index.php?r=site/AjaxObject',
        type: 'POST',
        data: item,
        dataType: 'JSON',
        success: function(data) {
          if (data.success == 1) {
             $('.no-success').html(data.errors);
             $('.ask-info .form .row input').each(function(){
              $(this).val('');
            });
 
          } else {
            $('.no-success').html(data.errors);
          }
            //$('.no-success').html("Errorsummary");
          }
        
      });
    });

    $('.mikihiirepidu').click(function(e) {
     
    });

    $(window).load(function() {
    if ($("#indexPage").length) {
      $.ajax({
        url: '/index.php?r=site/AjaxIndex',
        type: 'GET',
        success: function(data) {
          $.each(data.cars, function(i,item){
            $('.content').prepend('<div class="object"><a href="?r=site/object&amp;id='+item.ID+'"></a><div class="object-img"><img width="100%" height="auto" alt="" src="images/'+item.ID+'/small_'+item.mainImg+'"></div><div class="object-text"><h2>'+item.make+' '+item.model+'</h2><p>'+item.description+'</p></div></div>');       
          });
            //$('.no-success').html("Errorsummary");
          },
          error: function(data) {
            alert(error);
          }
        
      });
  }
    });   
});
  