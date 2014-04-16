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
<div class="container">
  <div class="content">    
    <?php 
    $i = 0;
    $cars_temp = $carsAr[0];
      echo '<input id="mina" type="hidden" value="1" />'

      ?>

        <?php foreach ($cars_temp as $car) {?>    
        <div class="object">
          <a href="?r=site/object&amp;id=<?php echo $car->ID; ?>"></a>
          <div class="object-img">
            <img alt="" src="images/<?php echo $car->ID; echo "/small_"; echo $car->mainImg; ?>" width="100%" height="auto"/>
          </div>    
          <div class="object-text">
            <h2><?php echo $car->make; echo " "; echo $car->model; ?></h2>
            <p><?php echo $car->description; ?></p>
          </div>
        </div>

      <?php } ?>    
      <div class="clear"></div>


    

    <div class="bottom-nav">
<?php 

$data = array();
foreach($model as $m){  // loop to get the data (this is different from the complex way)
$data[] = $m->attributes;
}

// the pagination widget with some options to mess
$this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>5,
            //'nextPageLabel'=>'My text >',
            'header'=>'',
        'htmlOptions'=>array('class'=>'pages'),
        )); ?>

      <button class="previous">Eelmised</button>
      <button class="next">Järgmised</button>
    </div>
  </div>
</div>