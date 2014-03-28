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
      <div>
        <?php echo CHtml::beginForm();
      
        echo CHtml::dropDownList('make', 0,$carMakes);
      
        echo CHtml::dropDownList('color', 0,$carColors); 
        
        ?>
      <!--</div>
      <div class="detail-search">
      <div> -->
        <?php 
      
        echo CHtml::dropDownList('year', 0, $carYears); 
  
        echo CHtml::dropDownList('location', 0, $carLocations); 

        echo CHtml::dropDownList('dateAdded', 0, $carDates); 
        
        echo CHtml::dropDownList('price', 0, $carPrices); 
        
        echo CHtml::submitButton('Otsi');
        
        echo CHtml::endForm(); ?>
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
    <?php
      /*
      Yii::app()->clientScript->registerScript('cars-update', '
      if(typeof(EventSource) !== "undefined") {
      var source = new EventSource("' . CController::createUrl('getCars') . '");
      source.onmessage = function(event) {
          $(".content").prepend(event.data).fadeIn(); // We want to display new messages above the stack
      };
      }
      ', CClientScript::POS_READY); 
      */
      ?>
    <div class="bottom-nav">
      <button class="previous">Eelmised</button>
      <button class="next">Järgmised</button>
    </div>
  </div>
</div>
