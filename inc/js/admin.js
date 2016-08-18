/*
 * My Syntax Highlighter
 * JavaScripts functions for Admin Pages
 * @since 1.0
 * @agareginyan
 */


(function(){
    "use strict";

    jQuery(document).ready(function($) {

        // Remove the "successful" message after 3 seconds
        if (".updated") {
            setTimeout(function() {
                $(".updated").fadeOut();
            }, 3000);
        }

    });

}());