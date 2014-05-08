<div class="container">
    <div class="content" id="login">
        <h2>Logi sisse, et hallata oma kontot ja autosid.</h2>        
        <div class="form">
            <?php echo CHtml::beginForm(); 
                  echo CHtml::errorSummary($model); ?>         
            <div class="row">
                <?php echo CHtml::activeLabel($model,'email'); 
                      echo CHtml::activeTextField($model,'email') ?>
            </div>         
            <div class="row">
                <?php echo CHtml::activeLabel($model,'password');   
                      echo CHtml::activePasswordField($model,'password') ?>
            </div>         
            <div class="row rememberMe">
                <?php echo CHtml::activeLabel($model,'rememberMe'); 
                      echo CHtml::activeCheckBox($model,'rememberMe'); ?>
            </div>         
            <div class="row submit">
                <?php echo CHtml::submitButton('Logi sisse'); 
                      $this->widget('ext.hoauth.widgets.HOAuth'); ?>
            </div>         
            <?php echo CHtml::endForm(); ?>
        </div><!-- form -->
        <div class="clear"></div>
    </div>
</div>