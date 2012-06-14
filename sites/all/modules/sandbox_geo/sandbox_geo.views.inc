<?php

//function sandbox_geo_views_pre_view(&$view, &$display_id, &$args) {
  //error_log(print_r('hook_views_pre_view', TRUE));
//}

function sandbox_geo_views_pre_render (&$view) {
  if ($view->name === 'ricerca_generica') {
    drupal_add_js(drupal_get_path('module', 'sandbox_geo') . '/sandbox_geo.js');
  }
  //error_log(print_r($view, TRUE));
}
