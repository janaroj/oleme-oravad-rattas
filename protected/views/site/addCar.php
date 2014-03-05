
	<div class="container">
	
	    <div class="content">
	        
	
	        <div class="content-small l-car">
	            <h1>Siin saad sa lisada uue auto</h1>
           
	<div class="form">
	<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Make'); ?>
        <?php echo CHtml::activeTextField($model,'make') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Model'); ?>
        <?php echo CHtml::activeTextField($model,'model') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Location'); ?>
        <?php echo CHtml::activeTextField($model,'location') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Year'); ?>
        <?php echo CHtml::activeTextField($model,'year') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Color'); ?>
        <?php echo CHtml::activeTextField($model,'color') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Status'); ?>
        <?php echo CHtml::activeTextField($model,'status') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Description'); ?>
        <?php echo CHtml::activeTextField($model,'description') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Price'); ?>
        <?php echo CHtml::activeTextField($model,'price') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'MainImg'); ?>
        <?php echo CHtml::activeTextField($model,'mainImg') ?>
    </div>
 
   
    <div class="row submit">
        <?php echo CHtml::submitButton('Lisa auto'); ?>
    </div>
 


<?php echo CHtml::endForm(); ?>
</div><!-- form -->

	        </div>
	
	    </div>
	</div>
	
