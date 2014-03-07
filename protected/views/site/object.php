<div class="container">

  <div class="content">
    <div class="detail-text">
      <h2><?php echo $car->make; echo " "; echo $car->model;?></h2>
        
        <h3>Üldandmed</h3>
        <table>
          <tr>
            <td>Asukoht</td>
            <td><?php echo $car->location; ?></td>
          </tr>
          <tr>
            <td>Väljalaskeaasta</td>
            <td><?php echo $car->year; ?></td>
          </tr>
          <tr>
            <td>Värvus</td>
            <td><?php echo $car->color; ?></td>
          </tr>
          <tr>
            <td>Saadavus</td>
            <td><?php echo $car->status; ?></td>
          </tr>
        </table>
        
        <h3>Info</h3>
        <p>
        <?php echo $car->description; ?>
        </p>
        <button class="ask-for-information">Küsi infot</button>
      <div class="ask-info">
      </div>
      </div>
      <div class="detail-img">
      <div class="big-image">
        <img src="images/<?php echo $car->ID; echo "/"; echo $car->mainImg; ?>" alt="pilt autost" />
      </div>
      <div class="small-image">
        <ul>
        <li>
          <img src="images/<?php echo $car->ID; echo "/"; echo $car->mainImg; ?>" />
        </li>
        
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