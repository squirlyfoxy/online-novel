<?php
    session_start();

    ///
    /// Controlla all'inizio se sono loggato, se si lui si connetterà al database che contiene
    /// l'ultima pagina.
    ///

    // VAriabili
    $novel_id = "";
    $position_frame = "";

    /// Per get io avrò la posizione e l'id del romanzo. Se non ricevo nulla visualizzo alcuni romanzi a video
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        //Se mi vengono passati dei dati per get:
        if($_GET['novel_id'] != "")
        {
            //Ottengo per get un valore che rappresenta l'id del romamzo
            $novel_id = $_GET['novel_id'];
        }

        if($novel_id != "" && $_GET['position_frame'] != "")
        {
            //Ottengo per get la posizione della pagina da leggere
            $position_frame = $_GET['position_frame'];
        }
    }

    //Se non ho ricevuto nulla:
    if($novel_id == "" && $position_frame == "")
    {
        // Redirect a ../
        header("location: ../");
    }
?>

<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--- BOOTSTRAP !--->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title>Online Novels - 
        <?php
            //Codice per visualizzare il nome del romanzo
        ?>
            </title>
    </head>
    <body>

        <!--- BOOTSTRAP !--->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>