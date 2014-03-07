<div class="header">
    <div class="container">
      <div class="login">
         
         <?php 
         echo Yii::app()->user->name;
         if (Yii::app()->user->isGuest) {
          echo CHtml::link('Logi sisse',array('login')); 
          echo CHtml::link('Registreeri',array('registration'));}
         else {
          echo CHtml::link('Minu kasutaja',array('myUser'));
          echo CHtml::link('Logi välja',array('logout'));
          }
          ?>
          
      </div>
      <div class="clear"></div>
    </div>

    <div class="search-box">
      <div class="container">
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
      <button class="logout">Otsi</button>
      <button class="more-details">Rohkem detaile</button>
      <div class="detail-search">
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
      <select>
          <option>Mis iganes</option>
          <option>Kes iganes</option>
          <option>Kus iganes</option>
          <option>Mida iganes</option>
        </select>
        

      </div>

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
      
  <div class="bottom-nav">
    <button class="previous">Eelmised</button>
    <button class="next">Järgmised</button>
  </div>
  <div class="clear"></div>

  </div>
</div>
