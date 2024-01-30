<?php


$root = $pages->parent()->children();
$placesOut = [];

foreach ($root as $entry) {
    if ($entry->blueprint()->name() == "pages/default") {
        if($entry->title()->value() == "Home") continue;
        if($entry->title()->value() == "Error") continue;

        $sub = array(
            "id" => $entry->id(),
            "name" => $entry->title()->value(),
            "blocks" => json_decode($entry->text()),
        );
        array_push($placesOut, $sub);
    }
}


echo json_encode($placesOut, JSON_HEX_QUOT | JSON_HEX_TAG);



