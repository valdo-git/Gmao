<?php

if(!function_exists('createCollectionTypeUnitFrequence')){
    function createCollectionTypeUnitFrequences(){
        $typeFreq = collect([
            [
                'type' => 'Calendaire',
                'unites' => ['Ans', 'Mois', 'Jours']
            ],
            [
                'type' => 'Horaire',
                'unites' => ['Heures', 'Minutes', 'Secondes']
            ],
            [
                'type' => 'Distance',
                'unites' => ['Mètres', 'Kilomètres']
            ]

            ]);
        return $typeFreq->values()->all();

    }
}
