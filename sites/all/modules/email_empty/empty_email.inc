<?php

function email_empty_feeds_presave(FeedsSource $source, $entity, $item) {
  
  if ($entity->feeds_item->entity_type == 'node') {
    // Skip saving this entity if email is empty.
    $entity->feeds_item->skip = TRUE;
  }

}
