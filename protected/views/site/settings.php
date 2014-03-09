

	<div class="container">
	
	    <div class="content">
	        
	        <?php include 'admin-sidebar.php' ?>
	                
	        <div class="content-small">
	            <h1>Siin saad sa oma seadeid muuta</h1>
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

                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Parool'); ?>
                    <?php echo CHtml::activePasswordField($model,'password') ?>
                </div>

                <div class="row">
                    <?php echo CHtml::activeLabel($model,'Korda parooli'); ?>
                    <?php echo CHtml::activePasswordField($model,'password') ?>
                </div>

	        </div>
	        <div class="clear"></div>
	    </div>
	</div>
	
	