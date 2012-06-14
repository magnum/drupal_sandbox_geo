(function () {
  function getLocation(viewform) {

    navigator.geolocation.getCurrentPosition(function (position) {
      var form_input_lat = $('#edit-distance-latitude', viewform);
      var form_input_lon = $('#edit-distance-longitude', viewform);
      form_input_lon.attr('value', position.coords.longitude);
      form_input_lat.attr('value', position.coords.latitude);
    }, function () { // getCurrentPosition error callback
      // In firefox clicking "Not Now" does NOT fire the error callback, vedi
      // https://bugzil.la/675533
      viewform.append('<div id="errore-geolocation">Errore di geolocalizzazione</div>');
    }, {
      //maximumAge: Infinity,
      // Accetta posizione cachata da non + di 100 minuti
      maximumAge: 0,
      //maximumAge: 6000000,
      // timeout di recupero info lat/lon. 20 secondi
      timeout: 20000,
    });
  }

  Drupal.behaviors.html5UserGeolocation = function (context) {
    var viewform = $('#views-exposed-form-ricerca-generica-page-1');
    // non far nulla se non trovi il form del filtro esposto della view
    if (viewform.length == 0) {
      return;
    }
    if (navigator.geolocation) {
      viewform.append('<div id="geolocation-in-atto">Geolocation in atto</div>');
      getLocation(viewform)
    }
    else { // HTML5 Geolocation not supported
      viewform.append('<div>Geolocation non supportata</div>');
    }
  };
}());
