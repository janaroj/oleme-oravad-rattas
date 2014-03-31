<div class="container">
  <div class="content">
  	<?php include 'admin-sidebar.php'; ?>    
    <div class="content-small">
    	<h1>Siin saad sa oma autosid muuta</h1>
    	<table class="request-table">
        <thead>
          <th>Auto</th>
          <th>Väljalaskeaasta</th>
          <th>Asukoht</th>
          <th>Staatus</th>
          <th></th>
          <th></th>
        </thead>
        <?php foreach ($cars as $car) { ?>
        <tr>
    			<td><?php echo $car['make'];echo " ";echo $car['model'] ?></td>
    			<td><?php echo $car['year']; ?></td>
    			<td><?php echo $car['location']; ?></td>
    			<td><?php echo $car['status']; ?></td>
          <td class="req-answer"><?php echo CHtml::link('Muuda',array('changeCar','carId' =>$car['ID']))?></td>
          <td class="req-answer"><?php echo CHtml::link('Kustuta',array('deleteCar','carId' =>$car['ID']))?></td>
  		  </tr>
        <?php } ?>
      </table>
    </div>
    <div class="clear" />
  </div>
</div>