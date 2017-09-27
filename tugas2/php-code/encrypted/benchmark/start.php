
<?php

    $time_start = microtime(true);

    require "../config.php";
    require "../secretkey.php";

    $connection = mysqli_connect($host, $username, $password, $dbname);



    if($connection === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }


    include "data-encryption.php";
    
    if(mysqli_query($connection, $sql)){

        echo "Records added successfully.";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);

    }

    mysqli_close($connection);

    $time_end = microtime(true);

    $execution_time = ($time_end - $time_start);

    echo '<br><br><b> Total Execution Time:</b> ' . $execution_time. ' seconds';



?>

