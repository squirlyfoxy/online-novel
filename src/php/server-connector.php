<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com
    include("log.php");

    $user_name = "root";
    $user_password = "";
    $db_name = "online-novels";
    $host = "localhost";
    $port = "3306";

    //$connection = new mysqli($host, $user_name, $user_password, $db_name, $port);

    //Errore nella connessione al server MYSQL
    if(mysqli_connect_errno())
    {
        LogConsole("Error: " . mysqli_connect_error());
        exit();
    }


?>
