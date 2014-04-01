<div class="container">
  <div class="content">
    <?php include 'admin-sidebar.php'; ?>
    <div class="content-small">
      <h1>Siin on sinule tulnud päringud</h1> <br/>
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
    			<td><?php echo $request['email']; ?></td>
    			<td><?php echo $request['phone']; ?></td>
    			<td><?php echo $request['text']; ?></td>
          <td class="req-answer">Vasta</td>
          <td class="req-answer">Keeldu</td>          			
    		</tr>
        <?php } ?> 
      </table>
    </div>
    <div class="clear"></div>
  </div>
</div>