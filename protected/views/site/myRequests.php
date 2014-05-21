<div class="container">
  <div class="content">
    <?php include 'admin-sidebar.php'; ?>
    <div class="content-small">
      <h1>Siin on sinule tulnud päringud</h1>
      <p>Võta ühendust kas meili või telefoni teel.</p>
      <br/>
      <table class="request-table">
        <thead>
          <th>Soovitud auto</th>
          <th>Email</th>
          <th>Telefon</th>
          <th>Lisainfo</th>
          <th></th>
          <th></th>
        </thead>
        <?php foreach ($requests as $request) { ?>
     		<tr>
    			<td><?php echo $request['make'];echo " ";echo $request['model'] ?></td>
    			<td><a href="mailto:<?php echo $request['email']; ?>"><?php echo $request['email']; ?></a></td>
    			<td><a href="tel:+372<?php echo $request['phone']; ?>"><?php echo $request['phone']; ?></a></td>
    			<td><?php echo $request['text']; ?></td>
          <td class="req-answer"><?php echo CHtml::link('Kustuta',array('deleteRequest','requestId'=>$request['ID']),array('confirm'=>"Oled kindel?"))?></td>          			
    		</tr>
        <?php } ?> 
      </table>
    </div>
    <div class="clear"></div>
  </div>
</div>