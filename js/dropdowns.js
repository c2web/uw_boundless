// jQuery plugin for the UW menu keyboard navigation
// Will only work with the specifc HTML code used by the UW Drupal and UW WordPress themes
( function ( $, Drupal, window, document ) {

    // Setup the jQuery plugin
    $.dawgDrops = function( element, options ) {

        // Variable that keeps track of the currently focused anchor in the menu
        // The `toplevel` property refers to the top level menu items
        // The `submen` property refers to the sub menu items under each top level menu item
        var index = {
          topmenu : 0,
          submenu : 0
        }

        // Translate the key codes into words for legibility
        , keys = {
          enter :   13,
          esc : 27,
          tab : 9,
          left : 37,
          up : 38,
          right : 39,
          down : 40,
          spacebar : 32
        }
        // Set a variable referencing the current plugin
        , this_ = this
        // Cache the current jQuery element using the plugin
        , $element = $(element)


        // Initializes the plugin
        this_.init = function() {
            // Binds the `keydown` event to the top menu and sub menu items
            $element.find('.dawgdrops-item > a').bind('keydown', toggleSubMenu )
            $element.find('.dawgdrops-menu a').bind('keydown', moveFocusInSubMenu )
        }

        // The function that handles the top level keyboard navigation
        var toggleSubMenu = function(e) {

            // Execute the correct logic based on which key is being pressed
            switch ( e.keyCode )
            {

              // When down or enter is pressed change the aria-expanded tags and focus on the first sub menu item
              case keys.enter :
              case keys.down  :

                $( e.currentTarget )
                  .attr( 'aria-expanded', 'true' )
                  .siblings('ul')
                    .attr( 'aria-expanded', 'true' )
                    .show()
                  .find('a')
                    .eq(0)
                    .focus()


                return false

              // When left is pressed move focus to the previous top level menu item
              case keys.left :
                $( e.currentTarget ).parent().prev().children('a').first().focus()
                return false


              // When right is pressed move focus to the next top level menu item
              case keys.right :
                $( e.currentTarget ).parent().next().children('a').first().focus()
                return false

              // When spacebar is pressed go to the URL the top level menu item points to
              case keys.spacebar:
                window.location.href = $( e.currentTarget ).attr('href')
                return false

            }
        }

      // This function handles the top sub level keyboard navigation
      var moveFocusInSubMenu = function(e) {

          // Get the current sub menu that's displaying
          var currentSubMenu = $( e.currentTarget ).closest('ul')
          // Get all the menu items in the current sub menu
          , currentSubMenuAnchors = currentSubMenu.find('a')


          // Execute the correct logic based on which key is being pressed
          switch ( e.keyCode ) {

            // When tab is pressed hide the current menu and reset the submenu index to zero
            // The browser will handle the moving of the focus to the next top level menu item
             case keys.tab:
                if ( currentSubMenu )
                {
                  currentSubMenu.hide()
                  index.submenu = 0
                }
                // Don't return false otherwise the default tab action will be cancelled
                break

              // When down is pressed calculate which menu item is next, set the index and focus on that menu item
              // If the last menu item is currently focused then the first menu item in the sub menu will be focused
              case keys.down:
                index.submenu = index.submenu === currentSubMenuAnchors.length-1 ? 0 : index.submenu + 1
                currentSubMenuAnchors.eq( index.submenu ).focus()
                return false

              // When up is pressed calculate which menu item is previous, set the index and focus on that menu item
              // If the first menu item is currently focused then the last menu item in the sub menu will be focused
              case keys.up :
                index.submenu = index.submenu === 0 ? currentSubMenuAnchors.length-1 : index.submenu - 1
                currentSubMenuAnchors.eq( index.submenu ).focus()
                return false

              // When left is pressed calculate which top level menu is previous and focus on it
              case keys.left:
                // Reset the current submenu index for the new submenu
                index.submenu = 0
                // Reset the aria-tags for the current submenu and focus on the previous top level menu item
                currentSubMenu.siblings('a').attr('aria-expanded', 'false')
                currentSubMenu.attr( 'aria-expanded', 'false' )
                  .hide().parent().prev().children('a').first().focus()
                return false;

              // When right is pressed calculate which top level menu is next and focus on it
              case keys.right:
                // Reset the current submenu index for the new submenu
                index.submenu = 0
                // Reset the aria-tags for the current submenu and focus on the next top level menu item
                currentSubMenu.siblings('a').attr('aria-expanded', 'false')
                currentSubMenu.attr( 'aria-expanded', 'false' )
                  .hide().parent().next().children('a').first().focus()
                return false;

              // When escape is pressed hide the current sub menu and focus on the current top level menu item
              case keys.esc:
                  // Reset the current submenu index
                  index.submenu = 0
                  currentSubMenu.attr('aria-expanded', 'false' )
                    .hide().parent().children('a').first().focus();
                  return false;

              // When spacebar or enter is pressed go to the URL the menu item links to
              case keys.spacebar:
              case keys.enter:
                window.location.href = $(e.currentTarget).attr('href')
                return false;

              // If any other key is pressed then search for a menu item that begins with that key/letter and focus on it
              default:
                var chr = String.fromCharCode(e.which)
                , exists = false;

                currentSubMenuAnchors.filter(function() {
                  exists = this.innerHTML.charAt(0) === chr
                  return exists;
                }).first().focus();
                return !exists;

          }
      }


      // Initialize the plugin
      this_.init();

    }

    // Setup the jQuery plugin
    $.fn.dawgDrops = function(options) {

        return this.each(function() {
            // Check if the plugin has already been initiated on the specific element
            if (undefined == $(this).data( 'dawgDrops' )) {
                var plugin = new $.dawgDrops( this, options );
                $(this).data( 'dawgDrops', plugin );
            }
        });

    }

})(jQuery, Drupal, this, this.document);
