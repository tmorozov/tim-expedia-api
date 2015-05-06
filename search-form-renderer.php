<?php

class TimExpediaApiFormRenderer {
  public static function renderForm($params) {
    ?>

<form class="js-search-hotel" method="get" action="/list/">
  <input type="hidden" name="lang" value="en">
  <input type="hidden" name="currency" value="USD">
<!--   
  <input type="hidden" name="pagename" id="pagename" value="ToSearchResults"/>
  <input type="hidden" name="secureUrlFromDataBridge" value="https%3A%2F%2Fwww.travelnow.com">
  <input type="hidden" name="requestVersion" value="V2">
 -->
  <fieldset class="destination">
    <div class="fullColumn">
      <label>Where would you like to go?</label>
      <input class="js-destination-field" type="text" name="destination" value="">
    </div>
  </fieldset>

  <fieldset class="check-in-out">
    <div>
      <label>
        <span>Check-in</span>
        <input class="js-checkin-date" type="text" name="checkin" value=""/>
      </label>
    </div>
  
    <div>
      <label>
        <span>Check-out</span>
        <input class="js-checkout-date" type="text" name="checkout" value=""/>
      </label>
    </div>
  </fieldset>

  <input class="js-room-count" type="hidden" name="roomsCount" value="1" id="roomsCount">
  
  <ol class="js-rooms-and-guests">
    <li>
      <fieldset>
        <legend>Room 1</legend>
        <label class="adults">
          <span class="label">Adults<br><span>(18+)</span></span>
          <select name="rooms[0][adultsCount]">
            <option value="1">1</option>
            <option value="2" selected>2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </label>

        <label class="children">
          <span class="label">Children<br><span>(0-17)</span></span>
          <select name="rooms[0][childrenCount]">
            <option value="0" selected>0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </label>

        <fieldset class="children-ages">
          <legend>Age</legend>
          <ul class="child-ages">
            <li>
              <label>
                <select name="rooms[0][children][0]" disabled>
                  <option value="">—</option>
                  <option value="0">&lt;1</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                </select>
              </label>
            </li>

          </ul>

        </fieldset>

      </fieldset>
    </li>

    <li class="add-row">
       <button class="js-add-room">Add room</button>
    </li>
  </ol>

  <button type="submit" class="js-searchbox-submit">Search</button>

  <div class="finalError">
    Please correct the errors above before proceeding
  </div>
</form>



    <?php    
  }
}