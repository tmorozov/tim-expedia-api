// rooms module
(function ($, Handlebars, app) {

  var Rooms = {
    start: function start ($el, options) {
      this.$el = $el;
      this.rooms = options.rooms || [];
      this.cacheElements($el);
      this.bindEvents($el);
      this.render($el);
    },

    cacheElements: function cacheElements($el) {
      this.$roomsCount = $el.find(".js-room-count");
      this.$roomsList = $el.find(".js-rooms-and-guests");
      this.roomsTemplate = Handlebars.templates["rooms"];
    },

    bindEvents: function bindEvents ($el) {
      this.$roomsList.on('click', '.js-add-room', this.addRoom.bind(this));
    },

    addRoom: function addRoom (e) {
      this.rooms.push({});
      this.render();
    },

    render: function render() {
      this.$roomsList.html(this.roomsTemplate(this));
      this.$roomsCount.val(this.rooms.length);
    }

  };


  // export:
  app.rooms = Rooms;

})(jQuery, Handlebars, timexpapiFormApp);
