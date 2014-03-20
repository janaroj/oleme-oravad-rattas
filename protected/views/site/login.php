
<div class="container">
    <div class="content">
        <h2>Logi sisse, et hallata oma kontot ja autosid.</h2>
        
        <div class="form">
        <?php echo CHtml::beginForm(); ?>
         
            <?php echo CHtml::errorSummary($model); ?>
         
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Email'); ?>
                <?php echo CHtml::activeTextField($model,'mail') ?>
            </div>
         
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Parool'); ?>
                <?php echo CHtml::activePasswordField($model,'password') ?>
            </div>
         
            <div class="row rememberMe">
                <?php echo CHtml::activeLabel($model,'rememberMe'); ?>
                <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
            </div>
         
            <div class="row submit">
                <?php echo CHtml::submitButton('Logi sisse'); ?>
                <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
            </div>
         
        <?php echo CHtml::endForm(); ?>
        </div><!-- form -->
        <div class="clear"></div>
    </div>
</div>
    