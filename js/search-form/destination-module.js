// datepicker module
(function ($, app) {

  // autocomlete with categories
  $.widget( "custom.catcomplete", $.ui.autocomplete, {
    _create: function() {
      this._super();
      this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
    },
    _renderMenu: function( ul, items ) {
      var that = this,
        currentCategory = "";
      $.each( items, function( index, item ) {
        var li;
        if ( item.category != currentCategory ) {
          ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
          currentCategory = item.category;
        }
        li = that._renderItemData( ul, item );
        if ( item.category ) {
          li.attr( "aria-label", item.category + " : " + item.label );
        }
      });
    },
    _renderItem: function( ul, item ) {
      return $( "<li>" )
        .attr( "data-value", item.value )
        .append( item.label )
        .appendTo( ul );
    }
  });

  var Destination = {
    start: function start ($el, options) {
      this.$el = $el;
      this.cacheElements($el);
      this.bindEvents($el);      
    },

    cacheElements: function cacheElements ($el) {
      this.$searchBox = $el.find(".js-destination-field");
    },

    bindEvents: function bindEvents ($el) {
   
      this.$searchBox.catcomplete({
        source: function( request, response ) {
          var term = request.term;
   
          $.ajax({
              url: "http://suggest.expedia.com/hint/es/v1/ac/en_US/" + term,
              jsonp: "callback",
              dataType: "jsonp",
              data: {
                  format: "json"
              },

              // responce description: http://hackathon.expedia.com/node/30           
              success: function( data ) {
                var mapped = data.r.map(function (item) {
                  return {
                    label: item.d,
                    category: item.t,
                    value: item.l
                  };
                }).sort(function (a, b) {
                  return a.category < b.category;
                });

                response(mapped);
              }
          });
        },
        minLength: 2
      });
    }

  };

  // export:
  app.destination = Destination;

})(jQuery, timexpapiFormApp);
