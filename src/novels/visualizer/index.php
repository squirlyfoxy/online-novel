<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    include_once("../../php/server-connector.php");
    include_once("../../php/log.php");

    if(!isset($_SESSION))
        session_set_cookie_params(0);

    session_start();

    // Variabili
    $novel_id = "";
    $novel_name = "";
    $novel_copertina = "";
    $novel_translators = "";
    $novel_autor = "";
    $novel_txt = "";
    $novel_likes = "";
    $novel_added_at = "";
    $position_frame = "";

    $gia_like = false;

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

    //Connettersi al database per avere le info romanzo e viasualizzarlo a video
    if($selected_novel_result = $connection->query("SELECT * FROM `novels` WHERE `id`='".$novel_id."'"))
    {
        while($row = $selected_novel_result->fetch_assoc())
        {
            $novel_name = $row['nome'];
            $novel_copertina = $row['copertina'];
            $novel_autor = $row['autore'];
            $novel_translators = $row['translators'];
            $novel_pdf_name = $row['pdf_name'];
            $novel_likes = $row['likes'];
            $novel_added_at = $row['added_at'];
        }
    } else
    {
        LogConsole("Errore nella ricerca del libro");
        
        // Redirect a ../
        header("location: ../");
    }

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    $usr_name = "";
    $usr_mail = "";
    $usr_id = 0;
    $user_icon = "";
    $is_logged = false;

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    if(isset($_SESSION['logged']))
    {
        if(($_SESSION['logged']) == true)
        {
            $is_logged = true;
            $usr_name = $_SESSION['usr_name'];
            $usr_id = $_SESSION['usr_id'];
            $usr_mail = $_SESSION['usr_mail'];

            if($_SESSION['usr_image'] == "default")
            {
                $user_icon = "../../img/usr.png";
            } else
            {
                $user_icon = $_SESSION['usr_image'];
            }
        }
    }

    //Controlla se ho messo mi piace a questo novel
    if($selected_novel_like = $connection->query("SELECT * FROM `novels_likes` WHERE `usr_id`='".$usr_id."' AND `novel_id`='".$novel_id."'"))
    {
        //SETTA A TRUE SE HA TROVATO QUALCOSA
        $rows = 0;

        while($row = $selected_novel_like->fetch_assoc())
            $rows++;

        if($rows == 1)
        {
            $gia_like = true;
        }
    }
?>

<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--- BOOTSTRAP !--->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!--- ICONS !--->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--- CUSTOM CSS !--->
        <link rel="stylesheet" href="../../css/nav-bar.css?version=234234">
        <link rel="stylesheet" href="../../css/style-novels.css?version=345345">
        <link rel="stylesheet" href="../../css/style-visualizer.css?version=112">
        <title>Online Novels - 
            <?php
                //Codice per visualizzare il nome del romanzo
                echo $novel_name;
            ?>
        </title>
    </head>
    <body>
        <!--- MENU !--->
        <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-dark sticky-top" id="navigator">
            <a class="navbar-brand" href="../../">Online Novels</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Archivio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" tabindex="-1" aria-disabled="true">Classifiche</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <?php
                            if($is_logged == false) //Non sono loggato, dai la possibilità di farlo
                            {
                                echo '<a class="nav-link" id="right" href="../../usr">Login/Registrati</a>';
                            } else
                            {
                                //Informazioni dell'utente loggato
                                echo '<a class="nav-link" id="right" href="../../usr/about/">'.$usr_name.'</a>';
                            }
                            echo '<img src="'.$user_icon.'" width="32" class="rounded-circle" style="margin-left: 5px; margin-right: 10px;"/>';
                        ?>
                    </li>                
                </ul>   
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Ricerca" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="">
                        <img src="../../img/src.png" width="32" />
                    </button>
                </form>
            </div>
        </nav>

        <div class="container-fluid">
            <center>
                <h1><?php echo $novel_name; ?></h1>
            </center>
            <div class="novel-info-desktop">
                <?php echo '<img class="card-img-top" src="../../img/upload/'.$novel_copertina.'" alt="'.$novel_name.'" style="width:150px;height:200px;display: inline-block;vertical-align: top;">'; ?>
                <div class="txt" style="display: inline-block;">
                    <?php 
                        //TODO: Aggiungere possibilità di mettere mi piace
                        echo 'Autore: <b>'.$novel_name.'</b> <br><br>
                        Tradotto Da: <b>'.$novel_translators.'</b> <br><br>
                        Pubblicato Il: <b>'.$novel_added_at.'</b> <br><br>
                        Likes: <b>'.$novel_likes.'</b> <br><br>'; ?>
                </div>
                <br>
                <br>
            </div>
            <div class="novel-info-phone">
                <center>
                    <b>Non vedi il testo correttamente? Prova la versione desktop</b>
                </center>
                <br>
            </div>
            <div class="navigator" style="
                    float: left;">
                <button type="button" class="btn btn-primary" onclick="downloadPDF('<?php echo $novel_pdf_name; ?>')"><i class="fa fa-download"></i> Download PDF</button>

                <?php
                    //Bottone per cavare o aggiungere un like
                    $redirect = "'?novel_id=".$novel_id."&position_frame=".$position_frame."'";
                    $usr_id_str = "'".$usr_id."'";
                    $novel_id_str = "'".$novel_id."'";

                    if($gia_like)
                    {
                        echo '
                            <button type="button" class="btn btn-primary" onclick="unlikeNovel('.$usr_id_str.', '.$novel_id_str.', '.$redirect.')"><i class="fa fa-thumbs-up"></i> Unlike</button>
                            ';
                    } else
                    {
                        echo '
                            <button type="button" class="btn btn-primary" onclick="likeNovel('.$usr_id_str.', '.$novel_id_str.', '.$redirect.')"><i class="fa fa-thumbs-up"></i> Like</button>
                            ';
                    }
                ?>
            </div>
            <br>
            <br>      
            <div class="novel-txt">
                <div id="novel-navigation-top">
                    <hr>
                    <center>
                        <button id="prev_top" class="btn btn-secondary btn-sm"><<<<<<<<</button>
                        <span id="page_num_top"></span> / <span id="page_count_top"></span>
                        <button id="next_top" class="btn btn-primary btn-sm">>>>>>>>></button>
                        &nbsp; &nbsp;
                    </center>
                </div>
                <hr>
                <canvas id="novel-pdf">
                </canvas>
                <hr>
                <div id="novel-navigation-down">
                    <center>
                        <button id="prev_down" class="btn btn-secondary btn-sm"><<<<<<<<</button>
                        <span id="page_num_down"></span> / <span id="page_count_down"></span>
                        <button id="next_down" class="btn btn-primary btn-sm">>>>>>>>></button>
                        &nbsp; &nbsp;
                    </center>
                    <hr>
                </div>
            </div>
            &nbsp; &nbsp;
        </div>

        <!--- SCRIPTS !--->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../../js/responsive.js"></script>
        <script src="../../js/key-listener.js"></script>
        <script src="../../js/buttons-events-listener.js"></script>
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script>
            //Codice per visualizzare a video il pdf

            // If absolute URL from the remote server is provided, configure the CORS
            // header on that server.
            var url = './upload/' + "<?php echo $novel_pdf_name; ?>";

            // Loaded via <script> tag, create shortcut to access PDF.js exports.
            var pdfjsLib = window['pdfjs-dist/build/pdf'];

            // The workerSrc property shall be specified.
            pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

            var pdfDoc = null,
                pageNum = <?php echo $position_frame; ?>,
                pageRendering = false,
                pageNumPending = null,
                scale,
                canvas = document.getElementById('novel-pdf'),
                ctx = canvas.getContext('2d');

            if($(document).width() >= 768)
            {
                scale = 1;
            } else{
                scale = 0.55;
            }
            
            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */
            function renderPage(num) {
                    pageRendering = true;
                    
                    // Using promise to fetch the page
                    pdfDoc.getPage(num).then(function(page) {
                    var viewport = page.getViewport({ scale: scale });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page into canvas context
                    var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                    };
                    var renderTask = page.render(renderContext);

                    // Wait for rendering to finish
                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            // New page rendering is pending
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                        });
                });

                // Update page counters
                document.getElementById('page_num_down').textContent = num;
                document.getElementById('page_num_top').textContent = num;
            }

            /**
             * If another page rendering in progress, waits until the rendering is
             * finised. Otherwise, executes rendering immediately.
             */
            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            /**
             * Displays previous page.
             */
            function onPrevPage() {
                if (pageNum <= 1) {
                    return;
                }
                pageNum--;
                //TODO: Codice PHP per aggiornare la pagina letta sul database

                queueRenderPage(pageNum);
            }

            document.getElementById('prev_top').addEventListener('click', onPrevPage);
            document.getElementById('prev_down').addEventListener('click', onPrevPage);

            /**
             * Displays next page.
             */
            function onNextPage() {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                //TODO: Codice PHP per aggiornare la pagina letta sul database

                queueRenderPage(pageNum);
            }

            document.getElementById('next_top').addEventListener('click', onNextPage);
            document.getElementById('next_down').addEventListener('click', onNextPage);

            /**
             * Asynchronously downloads PDF.
             */
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page_count_top').textContent = pdfDoc.numPages;
                document.getElementById('page_count_down').textContent = pdfDoc.numPages;

                // Initial/first page rendering
                renderPage(pageNum);
            }).catch(function(error){
                alert("Errore durante la richiesta del documento PDF, impossibile visualizzare il testo :(");
                window.location.replace("../");
            });
        </script>

        <!--- BOOTSTRAP !--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>