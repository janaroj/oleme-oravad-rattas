<div class="container">

    <div class="content">

        <?php include 'admin-sidebar.php'; ?>
    
        <div class="content-small">
            <h1>Siin on sinule tulnud päringud</h1> <br/>
         
                <table class="data-input-table">
                <tr>
                    <td>Auto</td>
                    <td>Nimi</td>
                    <td>Email</td>
                    <td>Telefon</td>
                    <td>Lisainfo</td>
                </tr>

                 <?php foreach ($requests as $request) { ?>
         		<tr>
          			<td><?php echo $request['make'];echo " ";echo $request['model'] ?></td>
          			<td><?php echo $request['mail']; ?></td>
          			<td><?php echo $request['phone']; ?></td>
          			<td><?php echo $request['text']; ?></td>
          			<td>
          			 <button class="approve-query">Vasta päringule</button>
                    <button class="decline-query">Keeldu päringust</button>
                    </td>
          		</tr>
          <?php } ?>
             
                   
                    </td>
                </tr>
            </table>
        </div>
         <div class="clear"></div>
    </div>
</div>

    
