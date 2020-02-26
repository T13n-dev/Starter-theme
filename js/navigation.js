( function(){
    var container, dropdown;
    var windowWidth = window.innerWidth;

    container = document.getElementsByClassName( 't-menu' );
    if ( !container ) {
        return;
    }

    dropdown = document.getElementsByClassName( 't-menu__megamenu-inner' );
    if ( !dropdown ) {
        return;
    }

    for( let i = 0; i < dropdown.length; i++ ) {
        var right = ( dropdown[i].getBoundingClientRect().width - ( windowWidth - dropdown[i].getBoundingClientRect().left ) ) > 0;
        // console.log( dropdown[i].getBoundingClientRect().width );
        // console.log( windowWidth - dropdown[i].offsetLeft );
        // console.log( right );
        if ( right ) {
            dropdown[i].style.cssText = "right: 50%; transform: translate(50%, 20px)";
        }
    }

})();

jQuery(function ($) { 

    $(document).ready(function () {

        var cateList = $('.t-header__category-list'); 
        var sideBar = cateList.siblings();   

        // sideBar.addClass('inactive');
        cateList.on("click", function(){
            // if( sideBar.hasClass('inactive') ) {
            //     sideBar.addClass('active');
            //     sideBar.removeClass('inactive');
            // } else {
            //     sideBar.addClass('active');
            //     sideBar.removeClass('inactive');
            // }
            sideBar.slideToggle('slow');
        });

    });

});