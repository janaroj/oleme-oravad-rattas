  $(function(){
    //Hide search when JS loads
    $(".detail-search").hide();
    };
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

      $("#stayOnline").click(function(){
      $(".modalDialog").fadeTo("fast",0.0);
      $(".modalDialog").css( "pointer-events", "none" ); 
      $(".timer").countdown("destroy");
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

  

    $(window).on('popstate', function (e) {
    e.preventDefault();

    var page = getURLParameter('page')-1;

    ajaxPaging(page);
    
  });



  $('#yw0 a').click(function(e){
      e.preventDefault();
      
      window.history.pushState("object or string", "Title", $(this).attr('href'));
      
      var page = getURLParameter('page')-1;
   
     ajaxPaging(page);

      
    });

    function getURLParameter(name) {
      return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||1;
    };

  function ajaxPaging(page){
    $.ajax({

        url: 'index.php?r=site/AjaxIndex&page='+page,
        type: 'GET',
        success: function(data) {
          
          $('.content .object').remove();
          
          $.each(data, function(i,item){
            $('.content').prepend('<div class="object"><a href="?r=site/object&amp;id='+item.ID+'"></a><div class="object-img"><img alt="" src="images/'+item.ID+'/small_'+item.mainImg+'"></div><div class="object-text"><h2>'+item.make+' '+item.model+'</h2><p>'+item.description+'</p></div></div>');     
          });
            $('#yw0 li.page').removeClass('selected');
    // $('#yw0 li.page:get('+(page-1)+')').addClass('selected');
       $('#yw0 li.page:eq('+(page)+')').addClass('selected');
    
          },
          error: function(data) {
            alert("Viga");
          }
      });
  };



