<div class="container">
	<div class="content">		
		<?php include 'admin-sidebar.php'; ?>
		<div class="content-small">
		    <h1><?php echo "Tere ";echo Yii::app()->user->getName();?></h1> 
			<p>Siin on sinu kasutaja leht</p>
			<p>Sul on			
				<?php   $userId = Yii::app()->user->id;
						$sql="SELECT count(*) as total from users inner join cars on users.id = cars.userId where users.id = $userId";
						$connection=Yii::app()->db; 
						$command=$connection->createCommand($sql);
						$result=$command->query();
						foreach ($result as $value) {
							echo $value['total'];
						}?>
				autot
			</p>
		</div>
		<div class="clear"></div>
	</div>
</div>