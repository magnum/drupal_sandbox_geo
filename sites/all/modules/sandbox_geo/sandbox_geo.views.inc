<?php

//function sandbox_geo_views_pre_view(&$view, &$display_id, &$args) {
  //error_log(print_r('hook_views_pre_view', TRUE));
//}

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
    drupal_add_js(drupal_get_path('module', 'sandbox_geo') . '/sandbox_geo.js');
  }
  //error_log(print_r($view, TRUE));
}
