<div class="container">

  <div class="content">
    <div class="detail-text">
      <h2><?php echo $car->make; echo $car->model;?></h2>
        <table>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
        <h3>
          Muu info:
        </h3>
        <p>
        <?php echo $car->description; ?>
        </p>
        <button class="ask-for-information">Küsi infot</button>
        <div class="ask-info">
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

  
  </div>