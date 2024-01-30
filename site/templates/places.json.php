<?php

$root = $pages->parent()->children();
$placesOut = [];


foreach ($root as $entry) {
  if ($entry->blueprint()->name() == "pages/places") {
  foreach ($entry->children() as $entryChild) {
        $sub = array(
          "id" => $entryChild->id(),
          "name" => $entryChild->title()->value(),
          "tags" => $entryChild->tag()->value(),
          "blocks" => json_decode($entryChild->text()),
          "location" => $entryChild->geolocation()->yaml(),
        );
        array_push($placesOut, $sub);
    }
  }
}

echo json_encode($placesOut, JSON_HEX_QUOT | JSON_HEX_TAG);

