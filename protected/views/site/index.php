<button class="open-search">OTSING</button>
  <div class="search-box">
    <div class="container">
      <div>
        <?php echo CHtml::beginForm();      
              echo CHtml::dropDownList('make', 0,$carMakes);      
              echo CHtml::dropDownList('color', 0,$carColors);            
              echo CHtml::dropDownList('year', 0, $carYears);         
              echo CHtml::dropDownList('location', 0, $carLocations);
              echo CHtml::dropDownList('dateAdded', 0, $carDates);               
              echo CHtml::dropDownList('price', 0, $carPrices);               
              echo CHtml::submitButton('Otsi');              
              echo CHtml::endForm(); ?>
      </div>
      <!--button class="more-details">Rohkem detaile</button-->
    </div>
  </div>
</div>
<div class="container" id="indexPage">
  <div class="content">
    <?php foreach ($model as $car) { ?>
      <div class="object">
        <a href="?r=site/object&amp;id=<?php echo $car->ID ?>"></a>
        <div class="object-img">
        <img alt="" src="images/<?php echo $car->ID ?>/small_<?php echo $car->mainImg ?>"></div>
        <div class="object-text">
          <h2><?php echo $car->make; echo " "; echo $car->model; ?></h2>
          <p><?php echo $car->description; ?></p>
        </div>
      </div>    
    <?php } ?>
  <div class="clear"></div>    
  <div class="bottom-nav">
  
    <div>Navigatsioon</div>
      <?php $this->widget('ext.CustomLinkPager', array(
          'pages' => $pages,

      )) ?>
  </div>
  <div class="clear"></div>
  </div>
  
</div>