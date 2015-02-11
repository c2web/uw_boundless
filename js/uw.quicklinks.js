(function ($, Drupal, window, document, undefined) {
  UW = (typeof(UW) === 'undefined') ? {} : UW;

  UW.quicklinks = {
    
    el         : '.uw-quicklinks',
    quicklinks : '#quicklinks',
    container  : '#uw-container',

    initialize : function () {
      this.$el = $(this.el);
      this.$quicklinks = $(this.quicklinks);
      this.$container = $(this.container);
      this.render();
      this.events();
    },

    render : function () {
      this.$el.attr( 'aria-controls', 'quicklinks' ).attr( 'aria-owns', 'quicklinks' );
    },

    events : function () {
      $('body').on( 'keydown', '#quicklinks a:first', this.inner_keydown.bind(this) );
      $('body').on( 'keyup', '#quicklinks a', this.animate.bind(this) );
      this.$quicklinks.on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', this.transitionEnd.bind(this));
      this.$el.bind({
        click      : this.animate.bind(this),
        touchstart : this.animate.bind(this),
        keyup      : this.animate.bind(this),
        blur       : this.loop.bind(this)
      }); 
    },
    
    animate : function ( event ) {
      event.preventDefault();

      if ( event.keyCode )
      {
        if ($.inArray(event.keyCode, [ 27 , 13 , 32 ]) == -1){
          return false;
        }
      }

      this.$container.toggleClass('open');
      this.$quicklinks.toggleClass('open');

      this.open = this.$quicklinks.hasClass('open');

      if (!this.open) {
        this.accessible();
      }
    },

    inner_keydown : function(event) {
      if ( e.keyCode == 9 && e.shiftKey) {
        this.$el.focus();
        return false;
      }
    },

    transitionEnd : function (event) {
      if (this.open && event.target == this.$quicklinks[0]) {
        this.accessible();
      }
    },

    accessible : function (){
      this.$el.attr( 'aria-expanded', this.open )
      this.$quicklinks.attr('aria-hidden',  ( ! this.open ).toString() )
      if ( this.open ) {
         this.$el.attr('aria-label', 'Close quick links');
         this.$quicklinks.find('a').attr( 'tabindex', 0 ).first().focus()
         $('#uw-container-inner').attr('aria-hidden', true);
         $('.screen-reader-shortcut').attr('aria-hidden', true)
      } else {
         this.$el.attr('aria-label', 'Open quick links');
         this.$quicklinks.find('a').attr( 'tabindex', -1 )
         this.$el.focus()
         $('#uw-container-inner').attr('aria-hidden', false);
         $('.screen-reader-shortcut').attr('aria-hidden', false);
      }
    },

    loop : function (event) {
      if( this.open ) {
          this.$quicklinks.find('li a').first().focus();
      }
    }
  }
})(jQuery, Drupal, this, this.document);
