<?php
    // Programmer: Leonardo Baldazzi, Tommaso Brandinelli (@squirlyfoxy, @MayonaiseMan), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    session_start();

    $what_do = $_GET['w'];

    //Ottieni le informazioni prese dal form in post
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
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

    /*
        Funzione per processare il LogIn dell'utente
    */
    function DoLogIn()
    {
        require_once("../php/server-connector.php");

        if((isset($_POST['email']) && isset($_POST['password'])) ||
            !(empty($_POST['email']) || empty($_POST['password'])))
        {
            $email_submitted = $_POST['email'];
            $password_submitted = md5($_POST['password']);

            if($usr_query_result = $connection->query("SELECT * FROM users WHERE `usr_name` == '".$email_submitted."' AND `usr_password` == '".$password_submitted."'"))
            {
                if($usr_query_result == 1)
                {
                    //TODO: Valida l'utente
                } else
                {
                    //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
                    header("location: ./?er=not_found");
                }
            }
        } else
        {
            header("location: ./?er=cams_not_filled");
        }
    }

    /*
        Funzione per processare la registrazione del nuovo utente
    */
    function DoRegistration()
    {
        require_once("../php/server-connector.php");

        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-check']) && 
            !(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password-check'])))
        {
            $user_name = $_POST['username'];
            $user_email = $_POST['email'];
            $user_password = md5($_POST['password']);
            $user_password_check = md5($_POST['password-check']);

            //CONTROLLA SE LE PASSWORD INSERITE SONO UGUALI
            if($user_password == $user_password_check)
            {
                //CONTROLLA SE ESISTE UN UTENTE CON QUESTO NOME UTENTE
                if($usr_name_query_result = $connection->query("SELECT * FROM users WHERE `usr_name` == '".$user_name."'"))
                {
                    if($usr_name_query_result->num_rows == 0)
                    {
                        //CONTROLLA SE ESISTE UN UTENTE CON QUESTA EMAIL
                        if($usr_email_query_result = $connection->query("SELECT * FROM users WHERE `usr_email` == '".$user_email."'"))
                        {
                            if($usr_email_query_result->num_rows == 0)
                            {
                                //SIAMO PRONTI PER AGGIUNGERE L'UTENTE

                                //TODO: Query per aggiungere l'utente alla tabella users

                                //TODO: Crea la session "utente", siamo già loggati di default
                            } else
                            {
                                //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
                                header("location: ./registrazione.php?er=email_already_registered");
                            }
                        }
                    } else
                    {
                        //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
                        header("location: ./registrazione.php?er=usr_already_registered");
                    }
                }
            } else
            {
                //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
                header("location: ./registrazione.php?er=paswd_not_equals");
            }
        } else
        {
            //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
            header("location: ./registrazione.php?er=cams_not_filled");
        }
    }
?>
