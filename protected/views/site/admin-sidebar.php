<div class="side-nav">  
	<?php 
     echo "<span class='choices'>";
     echo CHtml::link("Lisa auto",array('addCar'),array('class'=>'button'));
     echo "</span><span class='choices'>"; 
     echo CHtml::link('Muuda oma autosid',array('index'),array('class'=>'button'));  
     echo "</span><span class='choices'>";                   
     echo CHtml::link('Päringud',array('index'),array('class'=>'button'));
     echo "</span><span class='choices'>"; 
     echo CHtml::link('Muuda oma kasutaja seadeid',array('settings'),array('class'=>'button'));
     echo "</span><span class='choices'>"; 
     echo CHtml::link('Esilehele',array('index'),array('class'=>'button'));
     echo "</span><span class='choices'>"; 
	echo CHtml::link('Logi välja',array('logout'),array('class'=>'button'));
     echo "</span>";
     ?>
</div>