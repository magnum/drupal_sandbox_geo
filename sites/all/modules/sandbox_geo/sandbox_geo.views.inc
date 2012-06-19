<?php

function sandbox_geo_views_pre_render (&$view) {
  if ($view->name === 'ricerca_generica') {
    global $user;
    $locations = location_load_locations($user->uid, 'uid');
    if (!empty($locations[0]['latitude']) && !empty($locations[0]['longitude'])) {
      $user_preset_location = array(
        'user_preset_location_lat' => $locations[0]['latitude'],
        'user_preset_location_lon' => $locations[0]['longitude'],
      );
      drupal_add_js(array('sandbox_geo' => $user_preset_location), 'setting');
    }

    // aggiungi i google js google maps api V2 quando
    // non vengono aggiunti gia' dalla view quando la
    // view stessa e' vuota
    if (empty($view->result)) {
      global $language;
      $query = array(
        'file' => 'api',
        'v' => variable_get('gmap_api_version', GMAP_API_VERSION),
        'key' => gmap_get_key(),
        'hl' => $language->language,
      );
      drupal_set_html_head('<script src="'. check_url(url('http://maps.google.com/maps', array('query' => $query))) .'" type="text/javascript"></script>');
    }

    drupal_add_js(drupal_get_path('module', 'sandbox_geo') . '/sandbox_geo.js');
  }
}
