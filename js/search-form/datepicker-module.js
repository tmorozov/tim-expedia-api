// datepicker module
(function ($, app) {

  var Datepicker = {
    updateMaxCheckIn: function updateMaxCheckIn () {
      var date2 = this.$checkoutDate.datepicker('getDate');
      if(!date2) {
        return;
      }
      date2.setDate(date2.getDate()-1);
      this.$checkinDate.datepicker( "option", "maxDate", date2 );
    },

    updateMinCheckOut: function updateMinCheckOut () {
      var date2 = this.$checkinDate.datepicker('getDate');
      if(!date2) {
        return;
      }
      date2.setDate(date2.getDate()+1);
      this.$checkoutDate.datepicker( "option", "minDate", date2 );
    },

    start: function start ($el) {
      this.$checkinDate = $el.find('.js-checkin-date');
      this.$checkoutDate = $el.find('.js-checkout-date');

      var self = this;
      this.$checkinDate.datepicker({
        dateFormat : 'mm/dd/yy',
        minDate: -0,
        onClose: function( selectedDate ) {
          self.updateMinCheckOut();
        }
      });

      this.$checkoutDate.datepicker({
        dateFormat : 'mm/dd/yy',
        minDate: +1,
        onClose: function( selectedDate ) {
          self.updateMaxCheckIn();
        }
      });
    }

  };

  // export:
  app.datepicker = Datepicker;

})(jQuery, timexpapiFormApp);
