	<div class="container">
	
	    <div class="content">
	        
	       <div class="side-nav">
                <button class="add-car">Lisa auto</button>
                <button class="change-car">Muuda oma autosid</button>                        
                <!--
                <button class="car">Auto 1</button>
                -->
                <button class="my-querys">Vaata minule tehtud päringuid</button>
                <button class="change-settings">Muuda oma kasutaja seadeid</button>
                <button class="logout">Logi välja</button>              
           </div>

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
                   <?php echo CHtml::activeLabel($model,'Image'); ?>
                    <?php echo CHtml::activeFileField($model, 'image'); ?>
                 
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
	
