<?php

class TimExpediaApiFormRenderer {
  public static function renderForm($params) {
    ?>

<form class="js-search-hotel grid-container" method="get" action="/list/">
  <input type="hidden" name="lang" value="en">
  <input type="hidden" name="currency" value="USD">
<!--   
  <input type="hidden" name="pagename" id="pagename" value="ToSearchResults"/>
  <input type="hidden" name="secureUrlFromDataBridge" value="https%3A%2F%2Fwww.travelnow.com">
  <input type="hidden" name="requestVersion" value="V2">
 -->
  <fieldset class="destination">
    <div class="grid-100">
      <label>Where would you like to go?</label>
      <input class="js-destination-field" type="text" name="destination" value="" required />
    </div>
  </fieldset>

  <fieldset class="check-in-out">
    <div class="grid-50 mobile-grid-100">
      <label>
        <span>Check-in</span>
        <input class="js-checkin-date" type="text" name="checkin" value="" required />
      </label>
    </div>
  
    <div class="grid-50 mobile-grid-100">
      <label>
        <span>Check-out</span>
        <input class="js-checkout-date" type="text" name="checkout" value="" required />
      </label>
    </div>
  </fieldset>

  <input class="js-room-count" type="hidden" name="roomsCount" value="1">
  
  <!-- will be renndered by JS app -->
  <ol class="js-rooms-and-guests" style="margin-left: 0;">
  </ol>

  <button type="submit">Search</button>

  <div class="finalError">
    Please correct the errors above before proceeding
  </div>

</form>

    <?php    
  }
}