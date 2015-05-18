



// app start
(function ($, app) {

  app.start = function start () {
    app.datepicker.start();
  }

})(jQuery, timexpapiFormApp);


// start all (entry point)
(function ($, app) {

  $(function () {
    app.start();
  });

})(jQuery, timexpapiFormApp);

