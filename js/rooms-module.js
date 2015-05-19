// rooms module
(function ($, Handlebars, app) {

  function select2RoomIndexByName ($select) {
    // expect name to be like: rooms[index][...]
    return $select.attr("name").replace(/rooms\[(\d*)\].*/, '$1');
  }

  function select2ChildIndexByName ($select) {
    // expect name to be like: rooms[roomIndex][children][childIndex]
    return $select.attr("name").replace(/rooms\[(\d*)\]\[children\]\[(\d*)\].*/, '$2');
  }

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
      this.$roomsList.on('click', '.js-remove-room', this.removeRoom.bind(this));

      this.$roomsList.on('change', '.js-adults-count', this.changeAdultsCount.bind(this));
      this.$roomsList.on('change', '.js-children-count', this.changeChildrensCount.bind(this));
      this.$roomsList.on('change', '.js-child-age', this.changeChildAge.bind(this));
      
    },

    addRoom: function addRoom (e) {
      this.rooms.push({
        adultsCount: 2,
        childrenCount: 0,
        children: []
      });
      this.render();
    },

    removeRoom: function removeRoom (e) {
      e.preventDefault();
      var $btn = $(e.target);
      var roomIndex = $btn.data("room")
      this.rooms.splice(roomIndex, 1);

      this.render();
    },

    changeAdultsCount: function changeAdultsCount (e) {
      var $select = $(e.target);
      var roomIndex = select2RoomIndexByName($select);
      this.rooms[roomIndex].adultsCount = $select.val();
      // no need to render
    },

    changeChildrensCount: function changeChildrensCount (e) {
      var $select = $(e.target);
      var roomIndex = select2RoomIndexByName($select);
      var room = this.rooms[roomIndex];
      room.childrenCount = $select.val();
      room.children.length = room.childrenCount;

      this.render();
    },

    changeChildAge: function changeChildAge (e) {
      var $select = $(e.target);
      var roomIndex = select2RoomIndexByName($select);
      var childIndex = select2ChildIndexByName($select);

      var room = this.rooms[roomIndex];
      room.children[childIndex] = $select.val();
      // no need to render
    },

    render: function render() {
      this.$roomsList.html(this.roomsTemplate(this));
      this.$roomsCount.val(this.rooms.length);
    }

  };


  // export:
  app.rooms = Rooms;

})(jQuery, Handlebars, timexpapiFormApp);
