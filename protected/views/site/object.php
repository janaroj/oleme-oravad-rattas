<div class="container">

<?php 
	foreach ($car as $column => $value) {
 ?>

  <div class="content">
    <div class="detail-text">
      <h2> </h2>
        <table>
          <tr>
            <td><?php echo $column; ?></td>
            <td></td>
          </tr>
        </table>
        <h3>
          Muu info:
        </h3>
        <p>
        <?php //echo $car->description; ?>
        </p>
        <button class="ask-for-information">Küsi infot</button>
        <div class="ask-info">
          <form action="">
            <p>Nimi:<input type="text" name="Nimi"/></p>
            <p>Email:<input type="text" name="Email"/><br/></p>
            <p>Telefon:<input type="text" name="phone"/><br/></p>
            <p>Lisainfo:<input type="text" name="info" /><br/></p>
            <div><button>Küsi</button></div>
          </form>
        </div>
    </div>
    <div class="detail-img">
      <div class="big-image">
        <img src="img/big-image.jpg" alt="pilt autost" />
      </div>
      <div class="small-image">
        <ul>
          <li>
            <img src="img/big-image.jpg" alt="pilt autost" />
          </li>
          <li>
            <img src="img/car.jpg" alt="pilt autost" />
          </li>
          <li>
            <img src="img/car.jpg" alt="pilt autost" />
          </li>
        </ul>
      </div>
    </div>

    <button class="logout">Tagasi otsingutulemuste juurde</button>
    
    <div class="clear"></div>
  </div>
  <?php } ?>
  
  </div>