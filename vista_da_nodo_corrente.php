<?php
$view = new view;
$view->name = 'mappa2';
$view->description = 'mappa';
$view->tag = 'location';
$view->base_table = 'node';
$view->core = 6;
$view->api_version = '2';
$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */
$handler = $view->new_display('default', 'Defaults', 'default');
$handler->override_option('relationships', array(
  'field_owner_squadra_nid' => array(
    'label' => 'squadra_owner',
    'required' => 1,
    'delta' => -1,
    'id' => 'field_owner_squadra_nid',
    'table' => 'node_data_field_owner_squadra',
    'field' => 'field_owner_squadra_nid',
    'relationship' => 'none',
  ),
));
$handler->override_option('fields', array(
  'nid' => array(
    'label' => 'Nid',
    'alter' => array(
      'alter_text' => 0,
      'text' => '',
      'make_link' => 0,
      'path' => '',
      'absolute' => 0,
      'link_class' => '',
      'alt' => '',
      'rel' => '',
      'prefix' => '',
      'suffix' => '',
      'target' => '',
      'help' => '',
      'trim' => 0,
      'max_length' => '',
      'word_boundary' => 1,
      'ellipsis' => 1,
      'html' => 0,
      'strip_tags' => 0,
    ),
    'empty' => '',
    'hide_empty' => 0,
    'empty_zero' => 0,
    'hide_alter_empty' => 1,
    'link_to_node' => 0,
    'exclude' => 1,
    'id' => 'nid',
    'table' => 'node',
    'field' => 'nid',
    'relationship' => 'none',
    'override' => array(
      'button' => 'Override',
    ),
  ),
  'view_node' => array(
    'id' => 'view_node',
    'table' => 'node',
    'field' => 'view_node',
  ),
));
$handler->override_option('arguments', array(
  'field_owner_squadra_nid' => array(
    'default_action' => 'default',
    'style_plugin' => 'default_summary',
    'style_options' => array(),
    'wildcard' => 'all',
    'wildcard_substitution' => 'All',
    'title' => '',
    'breadcrumb' => '',
    'default_argument_type' => 'node',
    'default_argument' => '',
    'validate_type' => 'node',
    'validate_fail' => 'not found',
    'break_phrase' => 0,
    'not' => 0,
    'id' => 'field_owner_squadra_nid',
    'table' => 'node_data_field_owner_squadra',
    'field' => 'field_owner_squadra_nid',
    'validate_user_argument_type' => 'uid',
    'validate_user_roles' => array(
      2 => 0,
      3 => 0,
    ),
    'relationship' => 'none',
    'default_options_div_prefix' => '',
    'default_taxonomy_tid_term_page' => 0,
    'default_taxonomy_tid_node' => 0,
    'default_taxonomy_tid_limit' => 0,
    'default_taxonomy_tid_vids' => array(),
    'default_argument_user' => 0,
    'default_argument_fixed' => '',
    'default_argument_php' => '',
    'validate_argument_node_type' => array(
      'squadra' => 'squadra',
      'page' => 0,
      'post' => 0,
      'story' => 0,
    ),
    'validate_argument_node_access' => 0,
    'validate_argument_nid_type' => 'nid',
    'validate_argument_vocabulary' => array(),
    'validate_argument_type' => 'tid',
    'validate_argument_transform' => 0,
    'validate_user_restrict_roles' => 0,
    'validate_argument_php' => '',
  ),
  'nid' => array(
    'default_action' => 'default',
    'style_plugin' => 'default_summary',
    'style_options' => array(),
    'wildcard' => 'all',
    'wildcard_substitution' => 'All',
    'title' => '',
    'breadcrumb' => '',
    'default_argument_type' => 'node',
    'default_argument' => '',
    'validate_type' => 'node',
    'validate_fail' => 'not found',
    'break_phrase' => 0,
    'not' => 0,
    'id' => 'nid',
    'table' => 'node',
    'field' => 'nid',
    'validate_user_argument_type' => 'uid',
    'validate_user_roles' => array(
      2 => 0,
      3 => 0,
    ),
    'relationship' => 'field_owner_squadra_nid',
    'default_options_div_prefix' => '',
    'default_taxonomy_tid_term_page' => 0,
    'default_taxonomy_tid_node' => 0,
    'default_taxonomy_tid_limit' => 0,
    'default_taxonomy_tid_vids' => array(),
    'default_argument_user' => 0,
    'default_argument_fixed' => '',
    'default_argument_php' => '',
    'validate_argument_node_type' => array(
      'squadra' => 'squadra',
      'page' => 0,
      'post' => 0,
      'story' => 0,
    ),
    'validate_argument_node_access' => 0,
    'validate_argument_nid_type' => 'nid',
    'validate_argument_vocabulary' => array(),
    'validate_argument_type' => 'tid',
    'validate_argument_transform' => 0,
    'validate_user_restrict_roles' => 0,
    'validate_argument_php' => '',
  ),
));
$handler->override_option('filters', array(
  'type' => array(
    'operator' => 'in',
    'value' => array(
      'post' => 'post',
    ),
    'group' => '0',
    'exposed' => FALSE,
    'expose' => array(
      'operator' => FALSE,
      'label' => '',
    ),
    'id' => 'type',
    'table' => 'node',
    'field' => 'type',
    'relationship' => 'none',
  ),
  'latitude' => array(
    'operator' => 'not empty',
    'value' => array(
      'value' => '',
      'min' => '',
      'max' => '',
    ),
    'group' => '0',
    'exposed' => FALSE,
    'expose' => array(
      'operator' => FALSE,
      'label' => '',
    ),
    'id' => 'latitude',
    'table' => 'location',
    'field' => 'latitude',
    'relationship' => 'none',
  ),
  'longitude' => array(
    'operator' => 'not empty',
    'value' => array(
      'value' => '',
      'min' => '',
      'max' => '',
    ),
    'group' => '0',
    'exposed' => FALSE,
    'expose' => array(
      'operator' => FALSE,
      'label' => '',
    ),
    'id' => 'longitude',
    'table' => 'location',
    'field' => 'longitude',
    'relationship' => 'none',
  ),
  'distance' => array(
    'operator' => 'dist',
    'value' => array(
      'latitude' => '',
      'longitude' => '',
      'postal_code' => '',
      'country' => '',
      'php_code' => '',
      'nid_arg' => 'nid',
      'nid_loc_field' => 'node',
      'uid_arg' => '',
      'search_distance' => '10000',
      'search_units' => 'km',
    ),
    'group' => '0',
    'exposed' => TRUE,
    'expose' => array(
      'use_operator' => 0,
      'operator' => 'distance_op',
      'identifier' => 'distance',
      'label' => 'Location: Distance / Proximity',
      'user_location_choose' => 0,
      'optional' => 1,
      'remember' => 0,
    ),
    'identifier' => 'dist',
    'origin' => 'nid_arg',
    'id' => 'distance',
    'table' => 'location',
    'field' => 'distance',
    'relationship' => 'none',
    'gmap_macro' => '',
  ),
));
$handler->override_option('access', array(
  'type' => 'none',
));
$handler->override_option('cache', array(
  'type' => 'none',
));
$handler->override_option('items_per_page', 0);
$handler = $view->new_display('block', 'Block', 'block_1');
$handler->override_option('block_description', 'blocco da mostrare sulla vista di un nodo');
$handler->override_option('block_caching', -1);
$handler = $view->new_display('attachment', 'Attachment', 'attachment_1');
$handler->override_option('filters', array(
  'type' => array(
    'operator' => 'in',
    'value' => array(
      'post' => 'post',
    ),
    'group' => '0',
    'exposed' => FALSE,
    'expose' => array(
      'operator' => FALSE,
      'label' => '',
    ),
    'id' => 'type',
    'table' => 'node',
    'field' => 'type',
    'relationship' => 'none',
  ),
  'latitude' => array(
    'operator' => 'not empty',
    'value' => array(
      'value' => '',
      'min' => '',
      'max' => '',
    ),
    'group' => '0',
    'exposed' => FALSE,
    'expose' => array(
      'operator' => FALSE,
      'label' => '',
    ),
    'id' => 'latitude',
    'table' => 'location',
    'field' => 'latitude',
    'relationship' => 'none',
  ),
  'longitude' => array(
    'operator' => 'not empty',
    'value' => array(
      'value' => '',
      'min' => '',
      'max' => '',
    ),
    'group' => '0',
    'exposed' => FALSE,
    'expose' => array(
      'operator' => FALSE,
      'label' => '',
    ),
    'id' => 'longitude',
    'table' => 'location',
    'field' => 'longitude',
    'relationship' => 'none',
  ),
  'distance' => array(
    'operator' => 'dist',
    'value' => array(
      'latitude' => '',
      'longitude' => '',
      'postal_code' => '',
      'country' => '',
      'php_code' => '',
      'nid_arg' => 'nid',
      'nid_loc_field' => 'node',
      'uid_arg' => '',
      'search_distance' => '10000',
      'search_units' => 'km',
    ),
    'group' => '0',
    'exposed' => TRUE,
    'expose' => array(
      'use_operator' => 1,
      'operator' => 'distance_op',
      'identifier' => 'distance',
      'label' => 'Location: Distance / Proximity',
      'user_location_choose' => 0,
      'optional' => 1,
      'remember' => 0,
    ),
    'identifier' => 'dist',
    'origin' => 'nid_arg',
    'id' => 'distance',
    'table' => 'location',
    'field' => 'distance',
    'relationship' => 'none',
    'gmap_macro' => '',
    'override' => array(
      'button' => 'Use default',
    ),
  ),
));
$handler->override_option('style_plugin', 'gmap');
$handler->override_option('style_options', array(
  'grouping' => '',
  'macro' => '[gmap zoom=1 |center=50.736455137010665,0.703125 |width=640px |height=360px |control=Small |type=Map]',
  'datasource' => 'location',
  'latfield' => 'nid',
  'lonfield' => 'nid',
  'markers' => 'static',
  'markerfield' => 'nid',
  'markertype' => 'drupal',
  'center_on_nodearg' => 0,
  'center_on_nodearg_arg' => 'nid',
  'highlight_nodearg' => 0,
  'highlight_nodearg_arg' => 'nid',
  'highlight_nodearg_color' => '#FF0000',
  'tooltipenabled' => 0,
  'tooltipfield' => 'nid',
));
$handler->override_option('attachment_position', 'after');
$handler->override_option('inherit_arguments', TRUE);
$handler->override_option('inherit_exposed_filters', 1);
$handler->override_option('inherit_pager', FALSE);
$handler->override_option('render_pager', TRUE);
$handler->override_option('displays', array(
  'block_1' => 'block_1',
  'default' => 0,
));
