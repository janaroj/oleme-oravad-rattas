<div class="header">
    <div class="container">
    <div class="logo"></div>
      <div class="login">
         <?php
         if (Yii::app()->user->isGuest) { 
          echo "<span class='login-as'>";
          echo CHtml::link('Logi sisse',array('login'));
          echo "</span><span class='login-as'>"; 
          echo CHtml::link('Registreeri',array('registration'));
          echo "</span>";
        } else {
          echo "<span class='login-as'>Oled sisse logitud kui: ";
          echo Yii::app()->user->name;
          echo "</span>";      
          echo "<span class='login-as'>"; 
          echo CHtml::link('Minu kasutaja',array('myUser'));
          echo "</span><span class='login-as'>"; 
          echo CHtml::link('Logi välja',array('logout'));
          echo "</span>"; 
          }
          ?>
          
      </div>
      <div class="clear"></div>
    </div>

    <div class="search-box">
      <div class="container">
      <form>
    <?php echo CHtml::beginForm(); ?>
      <?php
        
        $jada = array();
        $jada[] = '(mark)';
        foreach ($cars as $car) {
          if(!in_array($car->make, $jada)){
            $jada[] = $car->make;
          }
        } 
        echo CHtml::dropDownList('make', $jada,
          $jada);
        ?>
      
      <?php 
        $jada = array();
         $jada[] = '(värv)';
        foreach ($cars as $car) {
          if(!in_array($car->color, $jada)){
            $jada[] = $car->color;  
          }
        } 
        echo CHtml::dropDownList('color', 0,$jada); 
        ?>
        
      <?php 

  echo CHtml::submitButton('Otsi'); 
            ?>

      <div class="detail-search">
        <?php 
        $jada = array();
         $jada[] = '(aasta)';
        foreach ($cars as $car) {
          if(!in_array($car->year, $jada)){
            $jada[] = $car->year;  
          }
        } 
        echo CHtml::dropDownList('year', 0, $jada); 
        ?>
     <?php 
        $jada = array();
         $jada[] = '(asukoht)';
        foreach ($cars as $car) {
          if(!in_array($car->location, $jada)){
            $jada[] = $car->location;  
          }
        } 
        echo CHtml::dropDownList('location', 0, $jada); 
        ?>
      <?php 
        $jada = array();
         $jada[] = '(Lisamise kuupäev)';
        foreach ($cars as $car) {
          $date = date("d.m.Y",strToTime($car->Date));
          if(!in_array($date, $jada)){
            $jada[] = $date;  
          }
        } 
        echo CHtml::dropDownList('dateAdded', 0, $jada); 
        ?>
        <?php 
        $jada = array();
         $jada[] = '(hind)';
        foreach ($cars as $car) {
          if(!in_array($car->price, $jada)){
            $jada[] = $car->price;  
          }
        } 
        echo CHtml::dropDownList('price', 0, $jada); 
        ?>
        <?php echo CHtml::endForm(); ?>
        </form>
      </div>
 <button class="more-details">Rohkem detaile</button>
      </div>

    </div>

  </div>

<div class="container">

  <div class="content">
      
  <?php foreach ($cars as $car) {?>
    <div class="object">
      <a href="?r=site/object&amp;id=<?php echo $car->ID; ?>"></a>
      <div class="object-img">
      
      <img alt="" src="images/<?php echo $car->ID; echo "/"; echo $car->mainImg; ?>" />
      </div>
      <div class="object-text">
      <h2><?php echo $car->make; echo " "; echo $car->model; ?></h2>
      <p><?php echo $car->description; ?></p>
      </div>
    
    </div>  
  <?php } ?>
      
  <div class="clear"></div>
  
  <div class="bottom-nav">
    <button class="previous">Eelmised</button>
    <button class="next">Järgmised</button>
  </div>
  </div>
</div>
