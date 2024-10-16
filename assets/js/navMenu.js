jQuery(document).ready(function($) {
    jQuery('.ez-hc-menu-item').hover(
        function() {
            jQuery(this).find('.ez-hyundai-components-modelos-submenu').stop(true, true).slideDown(200);
            jQuery(this).find('.ez-hyundai-components-submenu').stop(true, true).slideDown(200);
        },
        function() {
            jQuery(this).find('.ez-hyundai-components-modelos-submenu').stop(true, true).slideUp(200);
            jQuery(this).find('.ez-hyundai-components-submenu').stop(true, true).slideUp(200);
        }
    );
})