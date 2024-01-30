<?php





$root = $pages->parent()->children();

$placesOut = [];



foreach ($root as $entry) {

    if ($entry->blueprint()->name() == "pages/startseite") {



        $sub = array(
		"id" => $entry->id(),


            "headline" => $entry->headline()->value(),

            "subline" => $entry->subline()->value(),

            "text" => $entry->textblock()->value(),

            "blocks" => json_decode($entry->blocks()),

        );

        array_push($placesOut, $sub);

    }

}





echo json_encode($placesOut, JSON_HEX_QUOT | JSON_HEX_TAG);







