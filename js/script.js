
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

    // Place your code here.
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
        
        
    });//document.ready
    
})(jQuery, Drupal, this, this.document);