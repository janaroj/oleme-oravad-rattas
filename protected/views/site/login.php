<div class="form">
<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Email'); ?>
        <?php echo CHtml::activeTextField($model,'username') ?>
    </div>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Parool'); ?>
        <?php echo CHtml::activePasswordField($model,'password') ?>
    </div>
 
    <div class="row rememberMe">
        <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
        <?php echo CHtml::activeLabel($model,'rememberMe'); ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Logi sisse'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->