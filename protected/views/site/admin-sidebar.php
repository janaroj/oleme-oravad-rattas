<div class="side-nav">  
	<?php 
     /*
     echo "<span class='choices'>";
     echo CHtml::link("Minu profiil",array('myUser'),array('class'=>'button'));
     */
     echo "<span class='choices first'>"; 
     echo CHtml::link("Lisa auto",array('addCar'),array('class'=>'button'));
     echo "</span><span class='choices'>"; 
     echo CHtml::link('Muuda oma autosid',array('myCars'),array('class'=>'button'));  
     echo "</span><span class='choices'>";                   
     echo CHtml::link('Päringud sinu autodele',array('myRequests'),array('class'=>'button'));
     echo "</span><span class='choices'>";     
     echo CHtml::link('Muuda oma kasutaja seadeid',array('settings'),array('class'=>'button'));
     echo "</span>";
     echo "<span class='choices spacing first'>";
     echo CHtml::link('Esilehele',array('index'),array('class'=>'button'));
     echo "</span><span class='choices'>"; 
	echo CHtml::link('Logi välja',array('logout'),array('class'=>'button'));
     echo "</span>";
     ?>
</div>