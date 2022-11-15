<?php
    header("Content-type: application/json");
    $counter = isset($_POST["counter"]) ? $_POST["counter"] : 0;
    $card_type = array("S","H","D","C");
    $card_number = array("A", "2", "3", "4", "5", "6", "7", "8", "9", "X", "J", "Q", "K");
    $card_deck = array();
    for($i=0; $i < sizeof($card_type); $i++){
        for($j=0; $j < sizeof($card_number); $j++){
            $card_deck[] = $card_type[$i].'-'.$card_number[$j];
        }
    }

    //randomize the card deck
    shuffle($card_deck);
    
    $card_counter = sizeof($card_deck)-1;
    while($card_counter >= 0 && $counter > 0){
	    for($p=0; $p < $counter; $p++){
        	$person[$p] = isset($person[$p]) ? $person[$p].','.$card_deck[$card_counter] : $card_deck[$card_counter];
            
        	$card_counter -= 1;
            if($card_counter < 0)
                break;
    	}
    }

    for($z=(isset($person) ? sizeof($person) : 0); $z < $counter ; $z++){
    	$person[$z] = "";
    }
        
    echo (json_encode((isset($person) ? $person : "")));
    
    

?>