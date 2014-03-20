	<div class="container">
	
	    <div class="content">
	        
            <?php include 'admin-sidebar.php'; ?>

            <div class="content-small">
	            <h1>Siin saad sa muuta oma autot</h1>

           <?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
            	<div class="form">
            	<?php echo CHtml::beginForm(); ?>
             
                <?php echo CHtml::errorSummary($model); ?>
             
                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Mark'); ?>
                    <?php echo CHtml::activeTextField($model,'make') ?>
                </div>

                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Mudel'); ?>
                    <?php echo CHtml::activeTextField($model,'model') ?>
                </div>

                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Asukoht'); ?>
                    <?php echo CHtml::activeTextField($model,'location') ?>
                </div>

                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Väljalaskeaasta'); ?>
                    <?php echo CHtml::activeTextField($model,'year') ?>
                </div>

                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Värvus'); ?>
                    <?php echo CHtml::activeTextField($model,'color') ?>
                </div>

                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Saadavus'); ?>
                    <?php echo CHtml::activeTextField($model,'status') ?>
                </div>

                <div class="row description">
                    <?php echo CHtml::activeLabel($model,'Kirjeldus'); ?>
                    <?php echo CHtml::activeTextArea($model,'description') ?>
                </div>

                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Kilomeetri hind'); ?>
                    <?php echo CHtml::activeTextField($model,'price') ?>
                </div>

                <div class="row">
                   <?php echo CHtml::activeLabel($model,'Põhipilt'); ?>
                    <?php echo CHtml::activeFileField($model, 'image'); ?>
                 
               </div>

                <div class="row">
                   <?php echo CHtml::activeLabel($model,'Ülejäänud pildid'); ?>
                   <?php 
                $this->widget('CMultiFileUpload', array(
                'name' => 'images',
                'htmlOptions' => array('enctype' => 'multipart/form-data','multiple' => 'multiple'),
                'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                'duplicate' => 'Duplicate file!', // useful, i think
                'denied' => 'Invalid file type', // useful, i think
            ));
                    ?>

                 
               </div>
             
               
                <div class="row submit">
                    <?php echo CHtml::submitButton('Muuda autot'); ?>
                </div>
             
                <?php echo CHtml::endForm(); ?>
                </div><!-- form -->
            </div>
	       <div class="clear"></div>

	    </div>
	</div>
	
