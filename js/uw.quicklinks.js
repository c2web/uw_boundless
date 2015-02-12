(function ($, Drupal, window, document, undefined) {
  UW = (typeof(UW) === 'undefined') ? {} : UW;

  UW.quicklinks = {
    
    el                      : '.uw-quicklinks',
    quicklinks              : '#quicklinks',
    screen_reader_shortcuts : '.screen-reader-shortcut',
    container               : '#uw-container',
    container_inner         : '#uw-container-inner',
    open                    : false,
    animating               : false,

    initialize : function (options) {
      if (typeof(options) === 'object'){
        for (var key in options){
          if (options.hasOwnProperty(key) && this.hasOwnProperty(key)){
            if (typeof(this.key) === 'string') {
              this[key] = options[key];
            }
          }
        }
      }
      this.$el = $(this.el);
      this.$quicklinks = $(this.quicklinks);
      this.$screen_reader_shortcuts = $(this.screen_reader_shortcuts);
      this.$container = $(this.container);
      this.$container_inner = $(this.inner);
      this.render();
      this.events();
    },

    render : function () {
      this.$el.attr( 'aria-controls', 'quicklinks' ).attr( 'aria-owns', 'quicklinks' );
    },

    events : function () {
      this.$quicklinks.on('keydown', 'a:first', this.inner_keydown.bind(this) );
      this.$quicklinks.on('keyup',   'a',       this.animate.bind(this) );
      this.$quicklinks.on('blur',    'a:last',  this.loop.bind(this) );
      this.$quicklinks.on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', this.transitionEnd.bind(this));
      this.$el.bind({
        click      : this.animate.bind(this),
        touchstart : this.animate.bind(this),
        keyup      : this.animate.bind(this),
        blur       : this.blur.bind(this),
      }); 
    },
    
    animate : function ( event ) {
      event.preventDefault();

      if (this.animating || (event.keyCode && $.inArray(event.keyCode, [ 27 , 13 , 32 ]) == -1)){
        return false;
      }

      this.animating = true;
      this.$container.toggleClass('open');
      this.$quicklinks.toggleClass('open');
      this.open = this.$quicklinks.hasClass('open');

      if (!this.open) {
        this.accessible();
      }
    },

    inner_keydown : function(event) {
      if ( event.keyCode == 9 && event.shiftKey) {
        this.$el.focus();
        return false;
      }
    },

    transitionEnd : function (event) {
      if (this.open && event.target == this.$quicklinks[0]) {
        this.accessible();
      }
      this.animating = false;
    },

    accessible : function (){
      this.$el.attr( 'aria-expanded', this.open )
      this.$quicklinks.attr('aria-hidden',  ( ! this.open ).toString() )
      this.$container_inner.attr('aria-hidden', this.open.toString());
      this.$screen_reader_shortcuts.attr('aria-hidden', this.open.toString());
      if ( this.open ) {
         this.$el.attr('aria-label', 'Close quick links');
         this.$quicklinks.find('a').attr( 'tabindex', 0 ).first().focus()
      } else {
         this.$el.attr('aria-label', 'Open quick links');
         this.$quicklinks.find('a').attr( 'tabindex', -1 )
         this.$el.focus()
      }
    },

    blur : function (event) {
      if( this.open ) {
        this.$quicklinks.find('li a').first().focus();
      }
    },

    loop : function (event) {
      this.$el.focus();
    }
  }
})(jQuery, Drupal, this, this.document);
