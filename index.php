
<?php include 'header.php';?>
<div class="container">
  <div class="sidebar">
    <div class="sidebar-content">
    <select>
      <option>Mis iganes</option>
      <option>Kes iganes</option>
      <option>Kus iganes</option>
      <option>Mida iganes</option>
    </select>
    <select>
      <option>Mis iganes</option>
      <option>Kes iganes</option>
      <option>Kus iganes</option>
      <option>Mida iganes</option>
    </select>
    <select>
      <option>Mis iganes</option>
      <option>Kes iganes</option>
      <option>Kus iganes</option>
      <option>Mida iganes</option>
    </select>
    <button class="search">
      Otsi
    </button>
    </div>
    <div class="search-triangle"></div>
    <div class="open-search"><a href="">Otsing</a></div>
  </div>
  <div class="content">
      <div class="element">
      <a href="objekt.html">
        <img alt="" src="img/car.jpg" />
        <p>
          Delfi andmetel tabas politsei seltskonnauudiste kangelasest ärimehe ja jalgratturite liidu juhi Jaan Tootsi ööl vastu laupäeva Tallinnas autoroolist alkoholi pruukinuna
        </p>
      </a>
      </div>

      <div class="element">
        <img alt="" src="img/car.jpg" />
        <p>
          Delfi andmetel tabas politsei seltskonnauudiste kangelasest ärimehe ja jalgratturite liidu juhi Jaan Tootsi ööl vastu laupäeva Tallinnas autoroolist alkoholi pruukinuna
        </p>
      </div>
  </div>
  <div class="clear"></div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
  $(function(){
    $(".open-search a").click(function(){
      $(".sidebar-content").slideToggle();
      return false;
    });
  });

</script>
</body>
</html>