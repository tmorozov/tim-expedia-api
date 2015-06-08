<?php

class TimExpediaApiListRenderer {
  public static function renderHotelList($hotels) {
    // echo json_encode($hotels);

    echo "<ul>";

    foreach($hotels  as $key => $value) {
      $bestPrice = $value['lowRate'];
      if( isset($value["RoomRateDetailsList"]["RoomRateDetails"]["RateInfos"]["RateInfo"]["ChargeableRateInfo"]["@total"]) ) {
        $bestPrice = $value["RoomRateDetailsList"]["RoomRateDetails"]["RateInfos"]["RateInfo"]["ChargeableRateInfo"]["@total"];
      }
      ?>
      <li id="<?=$value['hotelId']?>" class="hotel-info grid-100">
          <div class="hotel-info__vcard grid-75 tablet-grid-75">
            <div class="hotel-info__image">
              <a href="<?=$value['deepLink']?>" class="thumb" target="_blank">
                <img src="http://images.travelnow.com/<?=$value['thumbNailUrl']?>" 
                alt="<?=$value['name']?>" width="70" height="70" 
                title="<?=$value['name']?>">
              </a>
            </div>

            <div class="hotel-info__information">
              <h2>
                <a href="<?=$value['deepLink']?>" target="_blank">
                  <?=$value['name']?>
                </a>
              </h2>

              <span class="star-rating rating-<?=str_replace('.', '-', $value['hotelRating'])?>" title="<?=$value['hotelRating']?>">
                <em>
                  <strong class="rating"><?=$value['hotelRating']?></strong> of 5 stars
                </em>
              </span>

              <span class="tripadvisor-rating ta<?=$value['tripAdvisorRating']?>">
<!--                 <em>
                  <strong class="rating"><?=$value['tripAdvisorRating']?></strong> of 5 stars
                </em>
 -->                <img src="<?=$value['tripAdvisorRatingUrl']?>" >
              </span>

              <a href="#" target="_blank" class="taReviewCount"><?=$value['tripAdvisorReviewCount']?> reviews</a>
              <div class="clear">
                <?=$value['locationDescription']?> |
                <a class="showOnMapLink iconSet" href="#">
                  <span class="iconText">Show on map</span>
                </a>
              </div>
            </div>
          </div>
        
          <div class="hotel-info__pricing grid-25 tablet-grid-25">
            <small>Total From</small>

            <a href="<?=$value['deepLink']?>" target="_blank">
              <div class="hotel-info__best-price">$<?=$bestPrice?></div>
            </a>

            <a href="<?=$value['deepLink']?>" class="ut-btn red small round" style="margin: 0;" target="_blank">Select</a>
          </div>
      </li>      
      <?php
    }

    echo "</ul>";
  }
}