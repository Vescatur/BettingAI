<?php

function IsAlive6_2() {
    return true;
}

/*
 * Dit is als je als de eerste speler speelt. 
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * $Hand is een getal van 1 tot en met 10
 * 
 * return -1 om te stoppen                                                      Je verliest dan niks
 * return een getal van 1 tot en met 10 om door te gaan. Dit is je inzet.       Je hebt kans om je inzet te verliezen
 */

function SpelerEenBeurtEen6_2($RandomGetal,$Hand) {
    if($Hand >= 4) {
        if($Hand-(($RandomGetal-5)/2)>=1){
            return $Hand-(($RandomGetal-5)/2);
        }else {
            return $Hand;
        }
    }else {
        return 0;
    }
}

/*
 * Dit is als je als tweede speler speelt. Je kan hier stoppen gelijkhouden of verhogen.
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * $Hand is een getal van 1 tot en met 10
 * $InzetSpelerEen is de inzet van speler een.
 * 
 * return -1 om te stoppen.                                                                 Je verliest hier niks
 * return 0 om gelijk te blijven                                                            Je kan je inzet verliezen
 * return 1 tot en met 10 om te verhogen. Dit is direct het aantal waarmee je verhoogt.     Je kan je inzet verliezen
 */


function SpelerTweeBeurtEen6_2($RandomGetal,$Hand,$InzetSpelerEen) {
    if($Hand >= $InzetSpelerEen) {
        return $RandomGetal;
    }else {
        return 0;
    }
}

/* 
 * Dit is als je de eerste speler speelt
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * $Hand is een getal van 1 tot en met 10
 * $InzetSpelerEen is de inzet van de eerste speler
 * $InzetSpelerTwee is de verhoging van de tweede speler
 * De totale inzet is dus $InzetSpelerEen+$InzetSpelerTwee
 * 
 * return -1 om te stoppen.     Je verliest dan je $InzetSpelerEen.
 * return 0 om mee te gaan      Je hebt kans om je $InzetSpelerEen plus $InzetSpelerTwee te winnen of verliezen.
 */

function SpelerEenBeurtTwee6_2($RandomGetal,$Hand,$InzetSpelerEen,$InzetSpelerTwee){
    return 0;
} 

