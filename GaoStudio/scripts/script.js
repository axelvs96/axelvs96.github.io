window.addEventListener('scroll', function() {
    if (window.scrollY > 0){
        $(".navbar").css('background-color', '#ffffff');
        $(".navbar").removeClass("navbar-dark");
        $(".navbar").addClass("navbar-light");
        $(".nav").css('background-color', '#ffffff');
        $(".imgnav").attr("src","/GaoStudio/images/logos/logo-negro.png");

        var i, $tBotonMenu = $('.botonmenu');
        for (i=0; i<$tBotonMenu.length; i++)    {
            $('.botonmenu')[i].style.setProperty('border-color', '#000000', 'important');
        }

        var $tEnlaces = $('.enlaces');
        for (i=0; i<$tEnlaces.length; i++)    {
            $('.enlaces')[i].style.setProperty('color', '#000000', 'important');
        }
        

    }
    else{
        $(".navbar").css('background-color', 'transparent');
        $(".navbar").removeClass("navbar-light");
        $(".navbar").addClass("navbar-dark");
        $(".nav").css('background-color', 'transparent');
        $(".imgnav").attr("src","/GaoStudio/images/logos/logo-blanco.png");

        var i, $tBotonMenu = $('.botonmenu');
        for (i=0; i<$tBotonMenu.length; i++)    {
            $('.botonmenu')[i].style.setProperty('border-color', '#ffffff', 'important');
        }

        
        var i, $tEnlaces = $('.enlaces');
        for (i=0; i<$tEnlaces.length; i++)    {
            $('.enlaces')[i].style.setProperty('color', '#ffffff', 'important');
        }
    }
});