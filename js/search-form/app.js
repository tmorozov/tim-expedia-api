// app start
(function ($, app) {

  app.start = function start (options) {
    // clone functionality for every widget
    $(".js-search-hotel").each(function (i) {
      var $el = $(this);
      var optionsInstance = $.extend(true, {}, options);
      
      $.extend({}, app.datepicker)
        .start($el);

      $.extend({}, app.rooms)
        .start($el, {
          rooms: optionsInstance.rooms
        });

      $.extend({}, app.destination)
        .start($el, {
        });
    });
  }

})(jQuery, timexpapiFormApp);


// start all (entry point)
(function ($, app) {

  // default values: 1 room 2 adults
  var options = {
    rooms: [{
      adultsCount: 2,
      childrenCount: 0,
      children: []
    }]
  };

  $(function () {
    app.start(options);
  });

})(jQuery, timexpapiFormApp);

