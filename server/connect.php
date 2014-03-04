<?php
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    $host = "eu-cdbr-azure-north-b.cloudapp.net";
    $user = "b4a53dec0a58f7";
    $pwd = "1e8e62eb";
    $db = "oravadrattasdb";
    // Connect to database.
    try {
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        echo ("what is going on");
    }
    catch(Exception $e){
        die(var_dump($e));
    }
    $sql_insert = "INSERT INTO cars (make,model) VALUES ('lada','2102')";
    $conn->query($sql_insert);

    $sql_select = "SELECT * FROM users";
    $stmt = $conn->query($sql_select);
    


    $users = $stmt->fetchAll(); 
    foreach ($users as $user) {
        echo $user['firstName'];
        echo '<br>';
        echo $user['lastName'];
        echo '<br>';
        echo $user['ID'];
        echo '<br>';
        echo $user['mail'];
        echo '<br>';
        echo $user['phone'];
        echo '<br>';


    }

    ?>