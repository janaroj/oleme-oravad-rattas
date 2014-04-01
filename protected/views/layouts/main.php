<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Oleme Oravad Rattas</title>
 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css' />
    <!-- Generate Favicon Using 1.http://tools.dynamicdrive.com/favicon/ OR 2.http://www.favicon.cc/ -->
    <link rel="shortcut icon" href="images/favicon.png" />

    <?php   
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile('css/style.css',null,array('async'=>'async'));
        $cs->registerScriptFile('//code.jquery.com/jquery-1.10.2.min.js',null);
        $cs->registerScriptFile('js/custom.js',null,array('async'=>'async'));?>
 
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
Yii::app()->db->createCommand($sql)->query();}
?>

</body>
</html>