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
      </div>
      <div class="detail-img">
      <div class="big-image">
        <img src="images/<?php echo $car->ID; echo "/"; echo $car->mainImg; ?>" alt="pilt autost" />
      </div>
      <div class="small-image">
        <ul>

        <?php foreach ($images as $image) { ?>
        
          <li>
            <img src="images/<?php echo $car->ID; echo "/"; echo $image->picture; ?>" alt="pilt autost" />
          </li>
        
          <?php } ?>
        
        </ul>
      </div>
    </div>

    <button class="logout">Tagasi otsingutulemuste juurde</button>
    
    <div class="clear"></div>
  </div>

  
  </div>