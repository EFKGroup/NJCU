<?php
// plugins/list_prefix.inc

// plugin info, you can copy from feeds tamper module's plugins
$plugin = array(
  'callback' => 'empty_email_tamper_plugin_callback',
  'name' => 'Empty Email',
  'category' => 'List',
);


// this is the real logic, notice that $fields can be String or an Array, depends on the definition of this plugin
function empty_email_tamper_plugin_callback($result, $item_key, $element_key, &$field, $settings) {
  $out = 0;

  if ($field == '') {
     $skip = &$entity->feeds_item->skip;
     $skip = TRUE;
  }

}
