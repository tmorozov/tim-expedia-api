(function ($) {

  var timexpapiFormApp = {

    start: function () {
      var $checkinDate = $('.js-checkin-date');
      var $checkoutDate = $('.js-checkout-date');

      $checkinDate.datepicker({
        dateFormat : 'mm/dd/yy',
        minDate: -0,
        onClose: function( selectedDate ) {
          $checkoutDate.datepicker( "option", "minDate", selectedDate );
        }
      });

      $checkoutDate.datepicker({
        dateFormat : 'mm/dd/yy',
        minDate: -0
      });
    }
  };


  $(function () {
    timexpapiFormApp.start();
  });

})(jQuery);

