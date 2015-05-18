// app start
(function ($, app) {

  app.start = function start () {
    $(".js-search-hotel").each(function (i) {
      var $el = $(this);
      app.datepicker.start($el);
      app.rooms.start($el, {
        rooms: [{
          adultsCount: 2,
          childrenCount: 0,
          children: []
        },{
          adultsCount: 1,
          childrenCount: 3,
          children: [1,1,1]
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

