<?php

$plugin = array(
  'form' => 'staff_feeds_tamper_plugin_form',
  'callback' => 'staff_feeds_tamper_plugin_callback',
  'name' => 'Staff',
  'category' => 'List',
);

function staff_feeds_tamper_plugin_form($importer, $element_key, $settings) {
  $form = array();
  $form['staff'] = array(
    '#type' => 'textfield',
    '#title' => t('Resource'),
    '#default_value' => '',
    '#description' => t('The machine name for the destination node department or group.'),
  );
  return $form;
}

function staff_feeds_tamper_plugin_callback($result, $item_key, $element_key, &$field, $settings) {
  $out = 0;
  $query = new EntityFieldQuery();

  $query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', $settings['staff'])
    ->propertyCondition('title', $field)
    ->range(0, 1)
    ->addMetaData('account', user_load(1)); // Run the query as user 1.

  $result = $query->execute();

  if (isset($result['node'])) {
    $news_items_nids = array_keys($result['node']);
    $news_items = entity_load('node', $news_items_nids);
  }

  $nid = 0;

  foreach ($result['node'] as $node) {
    $nid = $node->nid;
  }

  $field = $nid;
}
