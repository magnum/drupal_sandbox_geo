(function () {
  function latitudeToMercator(latitude) {
    return Math.log(Math.tan(latitude * Math.PI / 180) + 1 / Math.cos(latitude * Math.PI / 180));
  }

  Drupal.html5UserGeolocationLongitudeToPx = function (longitude, leftLongitude, width) {
    return (longitude - leftLongitude + 360) / 360 % 1 * width;
  }

  Drupal.html5UserGeolocationLatitudeToPx = function (latitude, topLatitude, bottomLatitude, height) {
    return (latitudeToMercator(latitude) - latitudeToMercator(bottomLatitude))
           / (latitudeToMercator(topLatitude) - latitudeToMercator(bottomLatitude))
           * height;
  }

  function plot() {
    var $map = $('#html5-user-geolocation-map'),
      latitude = $('#edit-html5-user-geolocation-latitude').attr('value'),
      longitude = $('#edit-html5-user-geolocation-longitude').attr('value');

    if (latitude == 0 && longitude == 0) {
      return;
    }

    // Plot coords
    $('#html5-user-geolocation-map .dot').css({
      left: '' + Drupal.html5UserGeolocationLongitudeToPx(longitude, -168, $map.width()) + 'px',
      bottom: '' + Drupal.html5UserGeolocationLatitudeToPx(latitude, 78, -58, $map.height()) + 'px'
    }).show();

    // Show precision
    $map.siblings('.description').find('span').html(
      (Math.acos(
        Math.sin(latitude * Math.PI / 180)
          * Math.sin((latitude) * Math.PI / 180)
        + Math.cos(latitude * Math.PI / 180)
          * Math.cos((latitude) * Math.PI / 180)
          * Math.cos(Math.pow(10, -1 * Drupal.settings.html5UserGeolocationPrecision) * Math.PI / 180)
      ) * 6371).toPrecision(3)
    );
  }

  function getLocation() {
    if ($('#edit-html5-user-geolocation-save').attr('checked')) {
      var $busy = $('#html5-user-geolocation-messages-wrapper .geolocating');
      $('#html5-user-geolocation-map-wrapper').slideDown('fast');

      // Get position
      $busy.show();
      navigator.geolocation.getCurrentPosition(function (position) {
        // Save coords
        $('#edit-html5-user-geolocation-latitude').attr('value', position.coords.latitude);
        $('#edit-html5-user-geolocation-longitude').attr('value', position.coords.longitude);

        plot();
        $busy.hide();
      }, function () { // getCurrentPosition error callback
        $('#edit-html5-user-geolocation-save').attr('checked', false).change();
      },
      {
        maximumAge: Infinity
      });
    }
    else { // Location not checked
      $('#html5-user-geolocation-map-wrapper').slideUp('fast');
    }
  }

  Drupal.behaviors.html5UserGeolocation = function (context) {
    if (navigator.geolocation) {
      $('#user-profile-form #edit-html5-user-geolocation-save:not(.html5-user-geolocation-processed)', context)
      .addClass('html5-user-geolocation-processed')
      .change(function () {
        getLocation();
      })
      .each(function () {
        $('#html5-user-geolocation-messages-wrapper .not-supported').hide();
        if ($('#edit-html5-user-geolocation-save').attr('checked')) {
          $('#html5-user-geolocation-map-wrapper').slideDown('fast');
          plot();
        }
        getLocation();
      });
    }
    else { // HTML5 Geolocation not supported
      $('#edit-html5-user-geolocation-save').attr('disabled', true);
    }
  };
}());