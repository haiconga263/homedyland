(function($){
    "use strict";
    function bizi_isotope(){
        var $grid =$('.affect-isotope').isotope({
            transitionDuration: '0.4s',
            masonry: {
                columnWidth:'.col-item'
            },
            fitWidth: true,
        });
        $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });
    }
    jQuery(document).ready(function($) {
        bizi_isotope();
        $("img.lazy").lazyload({
            threshold : 500
        });
    });

    jQuery(window).on( 'resize', function() {
        bizi_isotope();
    }).resize();

    jQuery(window).load(function(){
        bizi_isotope();
        $("img.lazy").lazyload({
            threshold : 500
        });
    });

})(jQuery);


