<!DOCTYPE html>
<?php header('Content-type: text/html; charset=utf-8'); ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Oleme Oravad Rattas</title>
 
    <link rel="shortcut icon" href="images/favicon.png" />

    <?php   
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile('css/jquery.countdown.min.css',null,array('async'=>'async'));
        $cs->registerCssFile('css/style.css',null,array('async'=>'async'));
        $cs->registerScriptFile('js/jquery-1.11.0.min,js',null);
        $cs->registerScriptFile('js/custom.min.js',null,array('async'=>'async'));
        $cs->registerScriptFile('js/jquery.plugin.min.js',null,array('async'=>'async'));
        $cs->registerScriptFile('js/jquery.countdown.min.js',null,array('async'=>'async'));
        ?>
 
</head>
<!--[if lt IE 7 ]> <body class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <body class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <body class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <body class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->

<?php echo $content;

    if (!(Yii::app()->user->isGuest)) {
      $userId = Yii::app()->user->id;
      $sql="UPDATE users SET lastActive=NOW() WHERE users.id = $userId";
      Yii::app()->db->createCommand($sql)->query();
      
      Yii::app()->clientScript->registerScript('check-activity', '
          if(typeof(EventSource) !== "undefined") {
          var source = new EventSource("' . CController::createUrl('isActive') . '");
          source.onmessage = function(event) {
              $(".modalContent").empty();
              $(".modalContent").prepend(event.data).fadeIn(); 
              $(".modalDialog").fadeTo("slow",1.0);
              $(".modalDialog").css( "pointer-events", "auto" ); 
              $(".timer").countdown("destroy");
              $(".timer").countdown({until: +5, format: "s", onExpiry: function() {
                window.location = $(".logout").attr("href");
},}); 
          };
          }
          ', CClientScript::POS_READY); 
    }
?>
<!--
<div id="openModal" class="modalDialog">
  <div>
    <h2>Hei</h2>
    <p class="modalContent"></p>
    <br>
    <div class="timer"></div>
    <?php echo CHtml::link('Jah, logi välja',array('logout'),array('class'=>'button-link logout')); ?>
  <button id="stayOnline" class="button-link">Ei, jää sisse</button>
  </div>
</div>-->
</div>
</body>
</html>