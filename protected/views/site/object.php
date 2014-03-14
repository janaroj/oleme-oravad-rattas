<div class="container">

  <div class="content">
    <div class="detail-text">
      <h2><?php echo $car->make; echo " "; echo $car->model;?></h2>
        
        <h3>Üldandmed</h3>
        <table>
          <tr>
            <td>Asukoht</td>
            <td><?php echo $car->location; ?></td>
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
        </table>
        
        <h3>Info</h3>
        <p>
        <?php echo $car->description; ?>
        </p>
        <button class="ask-for-information">Küsi infot</button>
        <div class="ask-info">
            <div class="form">
            <?php echo CHtml::beginForm(); ?>

             <div class="row">
                <?php echo CHtml::activeLabel($model,'Nimi'); ?>
                <?php echo CHtml::activeTextField($model,'name') ?>
                </div>

            <div class="row">
                <?php echo CHtml::activeLabel($model,'Email'); ?>
                <?php echo CHtml::activeTextField($model,'email') ?>
            </div>
         
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Telefon'); ?>
                <?php echo CHtml::activeTextField($model,'phone') ?>
                <div class="row">
                <?php echo CHtml::activeLabel($model,'Lisainfo'); ?>
                <?php echo CHtml::activeTextField($model,'text') ?>
            </div>

             <div class="row submit">
                <?php echo CHtml::submitButton('Päri infot'); ?>
            </div>


             <?php echo CHtml::endForm(); ?>
        </div>
      </div>
      <div class="detail-img">
      <div class="big-image">
        <img src="images/<?php echo $car->ID; echo "/"; echo $car->mainImg; ?>" alt="peamine pilt" />
      </div>
      <div class="small-image">
        <ul>
        <li>
          <img src="images/<?php echo $car->ID; echo "/"; echo $car->mainImg; ?>" alt="peamine pilt"/>
        </li>
        
        <?php foreach ($images as $image) { ?>
        
          <li>
            <img src="images/<?php echo $car->ID; echo "/"; echo $image->picture; ?>" alt="pilt autost" />
          </li>
        
          <?php } ?>
        
        </ul>
      </div>
    </div>

    <?php echo CHtml::link('Tagasi otsingutulemuste juurde',array('index')); ?>
    
    <div class="clear"></div>
  </div>

  
  </div>