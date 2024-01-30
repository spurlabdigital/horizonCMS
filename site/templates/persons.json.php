<?php


$root = $pages->parent()->children();
$placesOut = [];


foreach ($root as $entry) {
    if ($entry->blueprint()->name() == "pages/persons") {
        foreach ($entry->children() as $entryChild) {

            $stations = $entryChild->children();
            $stationsOut = [];


            foreach ($stations as $station) {
                $sub = array(
                    "id" => $station->id(),
                    "name" => $station->title()->value(),
                    "blocks" => json_decode($station->text()),
                    "location" => $station->station()->value(),
                );

                array_push($stationsOut, $sub);
            }

            $sub = array(
                "id" => $entryChild->id(),
                "name" => $entryChild->title()->value(),
                "time" => $entryChild->zeit()->value(),
                "vorname" => $entryChild->vorname()->value(),
                "nachname" => $entryChild->nachname()->value(),
                "geburtsName" => $entryChild->geburtsName()->value(),
                "blocks" => json_decode($entryChild->text()),
                "stations" => $stationsOut,
            );

            array_push($placesOut, $sub);
        }

    }
}



echo json_encode($placesOut, JSON_HEX_QUOT | JSON_HEX_TAG);



