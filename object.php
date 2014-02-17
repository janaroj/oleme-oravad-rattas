
<?php include 'header.php';?>
<div class="container">

  <div class="content">
    <div class="detail-text">
      <h2>Minu auto</h2>
        <table>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
          <tr>
            <td>Sinu ema ümbermõõt</td>
            <td>300cm</td>
          </tr>
        </table>
        <h3>
          Muu info:
        </h3>
        <p>
          Läti ajakirjandus kahtlustab, et venelased võisid Sotši olümpiamängude skeletonisõidus olümpiakulla teeninud Aleksandr Tretjakovi võidule aitamiseks sohki teha.


Lätlaste pahameel on tingitud asjaolust, et korraldajatel ei ole Tretjakovi sõidu algusest ühtegi videosalvestust ning venelase starte ei näidatud ka televisiooni otseülekandes. Samal ajal on hõbeda saanud lätlase Martins Dukursi ja kõigi teiste sõitjate start jäädvustatud videolindile, vahendab lenta.ru.
        </p>
    </div>
    <div class="detail-img">
      <div class="big-image">
        <img src="img/big-image.jpg">
      </div>
      <div class="small-image">
        <ul>
          <li>
            <img src="img/big-image.jpg">
          </li>
          <li>
            <img src="img/car.jpg">
          </li>
          <li>
            <img src="img/car.jpg">
          </li>
        </ul>
      </div>
    </div>
  <div class="clear"></div>
  </div>
  </div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
  $(function(){
    $(".more-details").click(function(){
      $(".detail-search").slideToggle();
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

</script>
</body>
</html>