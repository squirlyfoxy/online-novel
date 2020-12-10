<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    include_once("../../php/server-connector.php");
    include_once("../../php/log.php");

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
    $usr_id = 0;
    $user_icon = "../../img/usr.png";
    $is_logged;

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    //TODO: Non useremo il post ma il session
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //PER POST RICEVO LE INFORMAZIONI DELL'UTENTE

        //Controlla se sono giuste confrontandole con il database
    }

    //Se non ricevo nulla vuol dire che non sono loggato, quindi:
    if($usr_name == "" && $usr_id == "")
    {
        $is_logged = false;
    } else if($usr_name != "" && $usr_id != "")
    {
        $is_logged = true;
    } else
    {
        $is_logged = false;
    }
?>

<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--- BOOTSTRAP !--->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!--- CUSTOM CSS !--->
        <link rel="stylesheet" href="../../css/nav-bar.css?version=234234">
        <link rel="stylesheet" href="../../css/style-novels.css?version=345345">
        <link rel="stylesheet" href="../../css/style-visualizer.css?version=345345">

        <title>Online Novels - 
            <?php
                //Codice per visualizzare il nome del romanzo
                echo $novel_name;
            ?>
        </title>
    </head>
    <body>
        <!--- MENU !--->
        <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-dark sticky-top">
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
                                echo '<a class="nav-link" id="right" href="../usr">Login/Registrati</a>';
                            } else
                            {
                                //Informazioni dell'utente loggato
                                echo '<a class="nav-link" id="right" href="../usr/about/">'.$usr_name.'</a>';
                            }
                            echo '<img src="'.$user_icon.'" width="32"  style="margin-left: 5px; margin-right: 10px;"/>';
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
            <div class="novel-info-desktop">
                <?php
                    //Visualizzare le info del romanzo
                    echo "Nome: ".$novel_name.'<br>';
                    echo "Autore: ".$novel_autor;
                ?>
            </div>
            <div class="novel-info-phone">
                <?php
                    //Visualizzare le info del romanzo
                    echo "Nome: ".$novel_name.'<br>';
                    echo "Autore: ".$novel_autor;
                ?>
            </div>
            <div class="novel-txt">
                <div>
                    <button id="prev"><<<<<<<<</button>
                    <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
                    <button id="next">>>>>>>>></button>
                    &nbsp; &nbsp;
                </div>
                <canvas id="novel-pdf">
                </canvas>
            </div>
        </div>

        <!--- SCRIPTS !--->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                document.getElementById('page_num').textContent = num;
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
                queueRenderPage(pageNum);
            }

            document.getElementById('prev').addEventListener('click', onPrevPage);

            /**
             * Displays next page.
             */
            function onNextPage() {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                queueRenderPage(pageNum);
            }
            document.getElementById('next').addEventListener('click', onNextPage);

            /**
             * Asynchronously downloads PDF.
             */
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page_count').textContent = pdfDoc.numPages;

                // Initial/first page rendering
                renderPage(pageNum);
            });

            //JQuey responsive


            $(window).on('resize', function(){
                var win = $(this); //this = window
                //if (win.height() >= 820) { /* ... */ }
                if (win.width() <= 768)
                { 
                    /* ... */ 
                    scale = 0.55;
                } else
                {
                    scale = 1;
                }

                renderPage(pageNum);
            });
        </script>

        <!--- BOOTSTRAP !--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>