// datepicker module
(function ($, app) {
  var $checkinDate;
  var $checkoutDate;

  function updateMaxCheckIn () {
    var date2 = $checkoutDate.datepicker('getDate');
    if(!date2) {
      return;
    }
    date2.setDate(date2.getDate()-1);
    $checkinDate.datepicker( "option", "maxDate", date2 );
  }

  function updateMinCheckOut () {
    var date2 = $checkinDate.datepicker('getDate');
    if(!date2) {
      return;
    }
    date2.setDate(date2.getDate()+1);
    $checkoutDate.datepicker( "option", "minDate", date2 );
  }

  function start () {
    $checkinDate = $('.js-checkin-date');
    $checkoutDate = $('.js-checkout-date');

    $checkinDate.datepicker({
      dateFormat : 'mm/dd/yy',
      minDate: -0,
      onClose: function( selectedDate ) {
        updateMinCheckOut();
      }
    });

    $checkoutDate.datepicker({
      dateFormat : 'mm/dd/yy',
      minDate: +1,
      onClose: function( selectedDate ) {
        updateMaxCheckIn();
      }
    });
  }

  // export:
  app.datepicker =  {
    start: start
  };

})(jQuery, timexpapiFormApp);
