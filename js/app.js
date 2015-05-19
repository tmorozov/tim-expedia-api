// app start
(function ($, app) {

  app.start = function start () {
    $(".js-search-hotel").each(function (i) {
      var $el = $(this);
      var datepickerInstance = $.extend({}, app.datepicker);
      datepickerInstance.start($el);
      
      var roomsInstance = $.extend({}, app.rooms);
      roomsInstance.start($el, {
        rooms: [{
          adultsCount: 2,
          childrenCount: 0,
          children: []
        }]
      });
    });
  }

})(jQuery, timexpapiFormApp);


// start all (entry point)
(function ($, app) {

  Handlebars.partials = Handlebars.templates;

  $(function () {
    app.start();
  });

})(jQuery, timexpapiFormApp);

