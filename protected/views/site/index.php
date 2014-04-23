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
   

   
      <div class="clear"></div>


    

    <div class="bottom-nav">
    <button class="mikihiirepidu">aksdjaklsdjas</button>

    </div>
  </div>
</div>