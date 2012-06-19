(function () {

  function getLocationDoReverseGeocodingAndSubmit(viewform) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var form_input_lat = $('#edit-distance-latitude', viewform);
      var form_input_lon = $('#edit-distance-longitude', viewform);
      // write the lat/lon values in the form
      form_input_lat.attr('value', position.coords.latitude);
      form_input_lon.attr('value', position.coords.longitude);
      // obtain the human-readable address from the lat/lon
      doReverseGeocodingAndSubmit(position.coords.latitude, position.coords.longitude, viewform);
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

  // obtain the human-readable address from the lat/lon
  function doReverseGeocodingAndSubmit(lat, lon, viewform) {
    var geocoder = new GClientGeocoder();
    var glatlon = new GLatLng(lat, lon);
    geocoder.getLocations(glatlon, function (response) {
      if (!response || response.Status.code != 200) {
        // do something when the google reverse geocoding has failed
        // (that's after we successfully got the coordinates from the client)
      } else {
        // write in the textfield the reverse geocoded address
        var text_addr = response.Placemark[0].address;
        var ricerca_utente_text_field = $('#edit-distance-ricerca-utente', viewform);
        ricerca_utente_text_field.val(text_addr);
      }
      // submit the form so that the view uses the new lat/lon
      viewform.submit();
    });
  }

  Drupal.behaviors.mappagenerica = function (context) {
    var viewform = $('#views-exposed-form-ricerca-generica-page-1');
    var form_input_lat = $('#edit-distance-latitude', viewform);
    var form_input_lon = $('#edit-distance-longitude', viewform);
    // non far nulla se non trovi il form del filtro esposto della view
    if (viewform.length == 0) {
      return;
    }
    // usa la "user location" di Drupal (come preset) se esiste
    if (Drupal.settings.sandbox_geo !== undefined) {
      var preset_lat = parseFloat(Drupal.settings.sandbox_geo.user_preset_location_lat);
      var preset_lon = parseFloat(Drupal.settings.sandbox_geo.user_preset_location_lon);
      // safety net
      if (!isNaN(preset_lon) && !isNaN(preset_lat)) {
        form_input_lon.attr('value', preset_lat);
        form_input_lat.attr('value', preset_lon);
        doReverseGeocodingAndSubmit(preset_lat, preset_lon, viewform);
      }
    }
    // se invece abbiamo come lat e lon il valore di default della view (vuoti)
    // allora tenta la geolocation html5.
    else if (form_input_lat.val() === '' && form_input_lon.val() === '' && navigator.geolocation) {
      // meglio non mostrare messaggio di geolocalizzazione in atto
      // dato che non si riesce a rilevare il fatto che l'utente
      // scelga "Not Now" per la geolocalizzazione
      //viewform.append('<div id="geolocation-in-atto">Geolocation in atto</div>');
      getLocationDoReverseGeocodingAndSubmit(viewform)
    }

    // esegui il geocoding sul click del bottone di submit della vista
    var submit_button = $('input#edit-submit-ricerca-generica', viewform);
    submit_button.click(function (e) {
      e.preventDefault();
      var geocoder = new GClientGeocoder();
      var ricerca_utente_text_field = $('#edit-distance-ricerca-utente', viewform);
      geocoder.getLatLng(ricerca_utente_text_field.val(),
        function(point) {
          if (point) {
            form_input_lon.val(point.x);
            form_input_lat.val(point.y);
            viewform.submit();
          }
        });
    });

    // centra la mappa se ci sono lat/long
    if (Drupal.gmap) {
      Drupal.gmap.addHandler('gmap', function (elem) {
        var obj = this;
        obj.bind('ready', function () {
          var lat = form_input_lat.val();
          var lon = form_input_lon.val();
          if (lat !== '' && lon !== '') {
            var gmappa = Drupal.gmap.getMap('ricerca_generica');
            if (gmappa) {
              gmappa.map.setCenter(new GLatLng(lat, lon), 14);
            }
          }
        });
      });
    }
  };
}());
