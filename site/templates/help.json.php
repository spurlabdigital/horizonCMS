<?php


$root = $pages->parent()->children();
$placesOut = [];

foreach ($root as $entry) {
    if ($entry->blueprint()->name() == "pages/help") {

        $sub = array(
            "headline" => $entry->headline()->value(),
            "textA" => $entry->textA()->value(),
            "textB" => $entry->textB()->value(),
            "headline2" => $entry->headline2()->value(),
            "textC" => $entry->textC()->value(),
        );
        array_push($placesOut, $sub);
    }
}


echo json_encode($placesOut, JSON_HEX_QUOT | JSON_HEX_TAG);



