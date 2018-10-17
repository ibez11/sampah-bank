var $ = require('jquery');

var navigation = function() {
    var menu = $('.main-menu');
    var sidebar = $('.profile-sidebar');

    var toggleNavigation = function(){
        if(menu.css('left') == '-300px')
            menu.css('left', '0px');
        else
            menu.css('left', '-300px');
    };

    return {
        init: function() {
            var windowWidth = $(window).width();

            if(windowWidth <= 768){
                var navbutton = $('.navbar-toggle');
                var docheight = $(document).height();
    
                sidebar.css('min-height', docheight + 'px');
    
                navbutton.click(function(){
                    toggleNavigation();
                });
            }
        }
    }
}

$(window).on('load resize', function(){
    navigation().init();
});
