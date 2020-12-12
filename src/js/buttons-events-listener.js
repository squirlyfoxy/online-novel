// Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

//BUTTONS EVENTS HANDLER

/*
    Chiamato dal bottone "Download PDF" nella pagina ./visualizer/index.php
*/
function downloadPDF(nFile)
{
    window.location.replace("./upload/" + nFile);
}
