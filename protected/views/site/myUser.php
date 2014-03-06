
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
	        <button class="frontpage">Esilehele</button>
        	<button class="logout">Logi välja</button>
		</div>

		<div class="content-small">
		    <h1><?php echo "Tere ";echo Yii::app()->user->getName();?></h1> 
			<p>Siin on sinu kasutaja leht</p>
			<p>Sul on 
			
			
		<?php
		$userId = Yii::app()->user->id;
		$sql="SELECT count(*) as total from users inner join cars on users.id = cars.userId where users.id = $userId";
		$connection=Yii::app()->db; 
		$command=$connection->createCommand($sql);
		$result=$command->query();
		foreach ($result as $value) {
			echo $value['total'];
		}
   		

?> autot</p>
		</div>
		<div class="clear"></div>
	</div>
</div>
