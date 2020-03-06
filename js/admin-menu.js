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

});
