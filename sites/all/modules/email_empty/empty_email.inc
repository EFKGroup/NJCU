<?php

function email_empty_feeds_presave(FeedsSource $source, $entity, $item) {
  if ($entity->feeds_item->entity_type == 'node') {
    
  	dpm($entity);

    // Skip saving this entity if email is empty.
    $entity->feeds_item->skip = TRUE;

    //$my_field_items = field_get_items('node', $entity, 'field_email')[0]['email'];

    //dpm($my_field_items);
  }
}
