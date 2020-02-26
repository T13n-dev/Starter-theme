/**
 * * Author: Nguyen Huu Tien
 * * Admin menu wordpress
 * * Related File: custom-menu-fields.php
 */

jQuery(function ($) {
    var menu = $('#menu-to-edit');

    // logic menu
    (function () {
        function update() {
            menu.children().removeClass('mega-menu');
            menu.children('.menu-item-depth-0:has(.nht-mega-menu:checked)').each(function () {
                var item = $(this);
            
                item.addClass('mega-menu');
                item.nextUntil('.menu-item-depth-0').addClass('mega-menu');
            });
        }

        $(document).on('change', '.menu-item-depth-0 .nht-mega-menu', update);
        // FIXME our handler should be called after WP handler
        menu.on('sortstop', function () {
            setTimeout(update, 1);
        });
        
        update();
    })();

    // icon
    (function() {
        
        menu.on('click', '#mega-menu-pick-icon', function(e){
            e.preventDefault();

            $( '.nht-menu-modal-icon' ).css('display', 'block');
            
        });

        $('.media-modal-close, .media-modal-backdrop').on('click', function(e) {
            e.preventDefault();

            $( '.nht-menu-modal-icon' ).css('display', 'none');

        });

        $.getJSON("../../src/icons.json", function(json) {
            console.log(json); 
        });

        
    })();


});

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