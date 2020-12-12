<?php
    // Programmer: Leonardo Baldazzi, Tommaso Brandinelli (@squirlyfoxy, @MayonaiseMan), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    session_start();

    $what_do = $_GET['w'];

    //OPttieni le informazioni prese dal form in post
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        echo "AA";
        if($what_do == "log-in")
        {
            DoLogIn();
        } else if($what_do == "reg")
        {
            DoRegistration();
        } else
        {
            header("location: ./");
        }
    }

    function DoLogIn()
    {
        require_once("../php/server-connector.php");

        $email_submitted = $_POST['email'];
        $password_submitted = md5($_POST['password']);

        if($_POST['email'] == "" || $_POST['password'] == "")
        {
            header("location: ./");
        }

        if($usr_query_result = $connection->query("SELECT * FROM novels WHERE `usr_name` == '".$email_submitted."' AND `usr_password` == '".$password_submitted."'"))
        {

        } else
        {
            //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
            header("location: ./?er=not_found");

            echo "Utente non trovato";
        }
    }

    function DoRegistration()
    {

    }
?>