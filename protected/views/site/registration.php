<div class="form">
<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Email'); ?>
        <?php echo CHtml::activeTextField($model,'email') ?>
    </div>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Parool'); ?>
        <?php echo CHtml::activePasswordField($model,'password') ?>
    </div>

     <div class="row">
        <?php echo CHtml::activeLabel($model,'Kinnita parool'); ?>
        <?php echo CHtml::activePasswordField($model,'confirmedPassword') ?>
    </div>
 

    <div class="row">
    <?php echo CHtml::activeLabel($model,'Eesnimi'); ?>
        <?php echo CHtml::activeTextField($model,'firstName') ?>
    </div>

    <div class="row">
    <?php echo CHtml::activeLabel($model,'Perekonnanimi'); ?>
        <?php echo CHtml::activeTextField($model,'lastName') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Telefon'); ?>
        <?php echo CHtml::activeTextField($model,'phone') ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Registreeri'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->