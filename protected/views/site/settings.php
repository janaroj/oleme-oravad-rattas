<div class="container">
    <div class="content">        
        <?php include 'admin-sidebar.php' ?>                
        <div class="content-small">
            <h1>Siin saad sa oma seadeid muuta</h1>
            <?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Eesnimi'); 
                      echo CHtml::activeTextField($model,'firstName') ?>
            </div>
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Perekonnanimi'); 
                      echo CHtml::activeTextField($model,'lastName') ?>
            </div>
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Telefon'); 
                      echo CHtml::activeTextField($model,'phone') ?>
            </div>
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Parool'); 
                      echo CHtml::activePasswordField($model,'password') ?>
            </div>
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Uus Parool'); 
                      echo CHtml::activePasswordField($model,'password') ?>
            </div>
            <div class="row">
                <?php echo CHtml::activeLabel($model,'Korda parooli'); 
                      echo CHtml::activePasswordField($model,'password') ?>
            </div>
            <div class="row submit">
                <?php echo CHtml::submitButton('Muuda oma andmeid'); ?>
            </div>
            <?php echo CHtml::endForm(); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>