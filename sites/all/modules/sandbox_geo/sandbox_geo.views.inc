<?php
function sandbox_geo_views_pre_view(&$view, &$display_id, &$args) {
  error_log(print_r('hook_views_pre_view', TRUE));
  //error_log(print_r($view, TRUE));
  error_log(print_r($display_id, TRUE));
  error_log(print_r($args, TRUE));
}
