// Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

//BUTTONS EVENTS HANDLER

/*
    Chiamato dal bottone "Download PDF" nella pagina ./visualizer/index.php
*/
function downloadPDF(nFile)
{
    window.location.replace("./upload/" + nFile);
}

/*
    Chiamato dal bottone "Like" nella pagina ./visualizer/index.php
*/
function likeNovel(usrID, novelID, redirect)
{
    //Richiamo il codice php adatto per aggiungere un mio like
    if(usrID == 0)
    {
        window.location.replace("../../usr/?redirect=../novels/visualizer/" + redirect);
    } else
    {
        window.location.replace("../../php/add-like.php?usr_id=" + usrID + "&novel_id=" + novelID + "&redirect=" + redirect);
    }
}

/*
    Chiamato dal bottone "Unlike" nella pagina ./visualizer/index.php
*/
function unlikeNovel(usrID, novelID, redirect)
{

}
