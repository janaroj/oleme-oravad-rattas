	<div class="container">
	
	    <div class="content">
	        
            <?php include 'admin-sidebar.php'; ?>

            <div class="content-small">
	            <h1>Siin saad sa lisada uue auto</h1>

           <?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
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
                   <?php echo CHtml::activeLabel($model,'Main Image'); ?>
                    <?php echo CHtml::activeFileField($model, 'image'); ?>
                 
               </div>

                <div class="row">
                   <?php echo CHtml::activeLabel($model,'Other Images'); ?>
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
                    <?php echo CHtml::submitButton('Lisa auto'); ?>
                </div>
             
                <?php echo CHtml::endForm(); ?>
                </div><!-- form -->
            </div>
	       <div class="clear"></div>

	    </div>
	</div>
	
