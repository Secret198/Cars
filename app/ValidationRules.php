<?php

namespace App;

trait ValidationRules
{
    // public function CarCreateRules(){
    //         return [["name" => "required",
    //             "makers" => "required|numeric",
    //             "transmissions" => "required|numeric",
    //             "bodyTypes" => "required|numeric",
    //             "fuels" => "required|numeric",
    //             "colors" => "required|numeric"
    //     ],
    //         ["name.required" => "Név mező kitöltése kötelező",
    //         "makers.required" => "Gyártó kitöltése kötelező",
    //         "makers.numeric" => "Gyártó id-nak számnak kell lennie",
    //         "transmissions.required" => "Váltó kitöltése kötelező",
    //         "transmissions.numeric" => "Váltó id-nak számnak kell lennie",
    //         "bodyTypes.required" => "Kaszni kitöltése kötelező",
    //         "bodyTypes.numeric" => "Kaszni id-nak számnak kell lennie",
    //         "fuels.required" => "Üzemanyag kitöltése kötelező",
    //         "fuels.numeric" => "Üzemanyag id-nak számnak kell lennie",
    //         "colors.required" => "Szín kitöltése kötelező",
    //         "colors.numeric" => "Szín id-nak számnak kell lennie",]
    // ];
    // }

    public function GetErrorMessages(){
        return 
        ["name.required" => "Név mező kitöltése kötelező",
        "makers.required" => "Gyártó kitöltése kötelező",
        "makers.numeric" => "Gyártó id-nak számnak kell lennie",
        "transmissions.required" => "Váltó kitöltése kötelező",
        "transmissions.numeric" => "Váltó id-nak számnak kell lennie",
        "bodyTypes.required" => "Kaszni kitöltése kötelező",
        "bodyTypes.numeric" => "Kaszni id-nak számnak kell lennie",
        "fuels.required" => "Üzemanyag kitöltése kötelező",
        "fuels.numeric" => "Üzemanyag id-nak számnak kell lennie",
        "colors.required" => "Szín kitöltése kötelező",
        "colors.numeric" => "Szín id-nak számnak kell lennie",];

}
}
