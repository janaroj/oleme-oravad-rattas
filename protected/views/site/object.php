<!-- To end top navigation, this page has no search but div needs to be closed.-->
<div class="search-box"></div>
</div>
<div class="container">
  <div class="content">
    <div class="detail-text">
      <h2><?php echo ucwords($car->make." ".$car->model);?></h2>        
      <h3>Üldandmed</h3>
      <table>
        <tr>
          <td>Asukoht</td>
          <td><?php echo ucwords($car->location); ?></td>
        </tr>
        <tr>
          <td>Väljalaskeaasta</td>
          <td><?php echo $car->year; ?></td>
        </tr>
        <tr>
          <td>Värvus</td>
          <td><?php echo $car->color; ?></td>
        </tr>
        <tr>
          <td>Saadavus</td>
          <td><?php echo $car->status; ?></td>
        </tr>
        <tr>
          <td>Hind</td>
          <td><?php echo $car->price; ?></td>
        </tr>
      </table>        
      <h3>Info</h3>
      <p>
        <?php echo $car->description; ?>
      </p>
      <button class="ask-for-information">Küsi infot</button>
      <div class="ask-info">
        <div class="form">
          <input id="car_id" type="text" value="<?php echo $_GET['id']; ?>" style="display: none;">
          <?php echo CHtml::beginForm(); ?>          
          <div class="row">
            <?php echo CHtml::activeLabel($model,'name');
                  echo CHtml::activeTextField($model,'name') ?>
          </div>
          <div class="row">
              <?php echo CHtml::activeLabel($model,'email'); 
                    echo CHtml::activeTextField($model,'email') ?>
          </div>
          <div class="row">
              <?php echo CHtml::activeLabel($model,'phone'); 
                    echo CHtml::activeTextField($model,'phone') ?>
          </div>
          <div class="row">
              <?php echo CHtml::activeLabel($model,'text'); 
                    echo CHtml::activeTextField($model,'text') ?>
          </div>
          <div class="submit">
              <?php echo CHtml::submitButton('Saada päring'); ?>
          </div>
          <?php echo CHtml::endForm(); ?>
        </div>
        <div class="clear"></div>
        <div class="no-success"><?php echo CHtml::errorSummary($model); ?></div>
          
      </div>
    </div>
    <div class="detail-img">      
      <div class="big-image">
        <img src="images/<?php echo $car->ID; echo "/"; echo $car->mainImg; ?>" alt="peamine pilt" />
      </div>      
      <div class="small-image" id="owl-demo">
        
          <?php foreach ($images as $image) { ?>
          <div class="~item">
            <img src="images/<?php echo $car->ID; echo "/"; echo $image->picture; ?>" alt="pilt autost" />
          </div>
          <?php } ?>
        
        </div>  
    </div>  
    <div class="clear"></div>
    <span class="back"><?php echo CHtml::link('Tagasi otsingutulemuste juurde',Yii::app()->request->urlReferrer); ?></span>  
  </div>
</div>