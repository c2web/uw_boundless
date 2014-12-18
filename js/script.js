
/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

    // The document ready event executes when the HTML-Document is loaded
    // and the DOM is ready.
    jQuery(document).ready(function($) { 
        
        /**
         * this displays/hides the search area
         */
        $("li.uw-search").click(function() {
            $("body").toggleClass("search-open");
            $("#uwsearcharea").toggleClass("open");
        });
        /**
         * this displays/hides the quicklinks
         */
        $("li.uw-quicklinks").click(function() {
            $("#uw-container").toggleClass("open");
            $("#quicklinks").toggleClass("open");
        });
        
        $(".uw_boundless_dump").insertAfter("header.uw-thinstrip");
        
    });//document.ready
    
    
    // The window load event executes after the document ready event,
    // when the complete page is fully loaded.
    jQuery(window).load(function() {
        
        /**
         * relocate the alert banner
         */
        $("#uwalert-alert-message").insertAfter("header.uw-thinstrip");
        
    });//window.load
    
})(jQuery, Drupal, this, this.document);