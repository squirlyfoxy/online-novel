<?php
    // Programmer: Leonardo Baldazzi, Tommaso Brandinelli (@squirlyfoxy, @MayonaiseMan), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com
    session_set_cookie_params(0);
    session_start();

    $redirect = "a";

    //NON FUNZIONA
    if(isset($_GET['redirect']))
        $redirect = $_GET['redirect'];

    if(isset($_GET['w']))
        $what_do = $_GET['w'];
    else
        header("location: ./");
/*
    if(isset($_GET['redirect']) || $_GET['redirect'] != "")
        $redirect = $_GET['redirect'];*/

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
    } else
    {
        header("location: ./");
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

            $usr_query_result = $connection->query("SELECT * FROM users WHERE `usr_email` = '".$email_submitted."' AND `usr_password` = '".$password_submitted."'");

            if(!empty($usr_query_result) && $usr_query_result->num_rows > 0)
            {
                //if(count($usr_query_result) == 1)
                //{
                    while($row = $usr_query_result->fetch_assoc())
                    {
                        //Session
                        $usr_mail = $row['usr_email'];
                        $usr_name = $row['usr_name'];
                        $usr_id = $row['id'];
                        $usr_image = $row['usr_image'];

                        $_SESSION['usr_name'] = $usr_name;
                        $_SESSION['usr_mail'] = $usr_mail;
                        $_SESSION['usr_id'] = $usr_id;
                        $_SESSION['usr_image'] = $usr_image;

                        $_SESSION['logged'] = true;
/*
                        if($redirect == "")
                            header("location: ./about/");
                        else
                            header("location: " + $redirect);*/
                        header("location: ./about/");
                        }
                //} else
                //{
                    //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
                    //header("location: ./?er=not_found");
                //}
            } else
            {
                //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
                header("location: ./?er=not_found");
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
                $usr_name_query_result = $connection->query("SELECT * FROM users WHERE `usr_name` == '".$user_name."'");

                if(!empty($usr_name_query_result) && $usr_name_query_result->num_rows == 0)
                {
                    //if()
                    //{
                        $usr_email_query_result = $connection->query("SELECT * FROM users WHERE `usr_email` == '".$user_email."'");
                        //CONTROLLA SE ESISTE UN UTENTE CON QUESTA EMAIL
                        //if($usr_email_query_result)
                        //{
                            if(!empty($usr_email_query_result) && $usr_email_query_result->num_rows == 0)
                            {
                                //SIAMO PRONTI PER AGGIUNGERE L'UTENTE

                                //Query per aggiungere l'utente alla tabella users
                                if($connection->query("INSERT INTO `users`(`id`, `usr_name`, `usr_email`, `usr_password`, `usr_image`) VALUES ('', '$user_name','$user_email','$user_password','default')") == true) 
                                {
                                    //Session
                                    $_SESSION['usr_name'] = $user_name;
                                    $_SESSION['usr_mail'] = $user_email;

                                    $usr_id = 0;
                                    //Ottengo l'ID del nuovo utente
                                    if($id_result = $connection->query("SELECT * FROM users WHERE `usr_name` == '".$user_name."'"))
                                    {
                                        if(count($id_result) == 1)
                                        {
                                            while($row = $id_result->fetch_assoc())
                                            {
                                                $usr_id = $row['id'];
                                            }
                                        }
                                    }

                                    $_SESSION['usr_image'] = "default";
                                    $_SESSION['usr_id'] = $usr_id;
            
                                    $_SESSION['logged'] = true;

                                    if($redirect == "")
                                        header("location: ./about/");
                                    else
                                        header("location: " + $redirect);
                                } else
                                {
                                    //Errore
                                    echo "Error: <br>" . $connection->error;
                                }
                            } else
                            {
                                //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
                                header("location: ./registrazione.php?er=email_already_registered");
                            }
                        //}
                    //}
                } else
                {
                    //REDIRECT ALLA PAGINA PRECEDENTE CON UN MESSAGGIO DI ERRORE
                    header("location: ./registrazione.php?er=usr_already_registered");
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
