//JQuey responsive resize
window.addEventListener('scroll', function() {
    var element = document.querySelector('#novel-navigation-top');
    var position = element.getBoundingClientRect();

    // checking whether fully visible
    if(position.top >= 0 && position.bottom <= window.innerHeight) {
        $("#novel-navigation-top").css("display","inline");
        $("#novel-navigation-down").css("display","none");
    } else{
        $("#novel-navigation-top").css("display","none");
        $("#novel-navigation-down").css("display","inline");
    }
});

    $(window).on('resize', function(){
        var win = $(this); //this = window
    if (win.width() <= 768)
    { 
        scale = 0.55;
    } else
    {
        scale = 1;
    }

    renderPage(pageNum);
});
