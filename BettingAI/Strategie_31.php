<?php

VoegStrategieToe(31,1);

/*
 * Dit is als je als de eerste speler speelt. 
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * 
 * return -1 om te stoppen                                                      Je verliest dan niks
 * return een getal van 5 tot en met 10 om door te gaan. Dit is je inzet.       Je hebt kans om je inzet te verliezen
 */

function SpelerEenBeurtNul31_1($RandomGetal) {
    return 5+($RandomGetal/2);
}

/*
 * Dit is als je als de eerste speler speelt. 
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * 
 * return -1 om te stoppen                                                      Je verliest dan niks
 * return 0 tot en met 10 om te verhogen. Dit is het aantal waarmee je verhoogt.     Je kan je inzet verliezen
 */

function SpelerTweeBeurtNul31_1($RandomGetal,$InzetSpelerEenBeurtNul) {
    return 10-$InzetSpelerEenBeurtNul;      
}

/*
 * Dit is als je als de eerste speler speelt. 
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * $Hand is een getal van 1 tot en met 10
 * 
 * return -1 om te stoppen                                                           Je verliest dan je inzet
 * return 0 tot en met 10 om te verhogen. Dit is het aantal waarmee je verhoogt.     Je kan je inzet verliezen
 */

function SpelerEenBeurtEen31_1($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul) {
    if($Hand >= 4) {
        if($Hand+(($RandomGetal-5)/2)>=1 && $Hand+(($RandomGetal-5)/2)<=10){
            return $Hand+(($RandomGetal-5)/2);
        }else {
            return $Hand;
        }
    }else {
        return -1;
    }
}

/*
 * Dit is als je als tweede speler speelt. Je kan hier stoppen gelijkhouden of verhogen.
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * $Hand is een getal van 1 tot en met 10
 * $InzetSpelerEen is de inzet van speler een.
 * 
 * return -1 om te stoppen.                                                                 Je verliest dan je inzet                                                        Je kan je inzet verliezen
 * return 0 tot en met 10 om te verhogen. Dit is het aantal waarmee je verhoogt.     Je kan je inzet verliezen
 */


function SpelerTweeBeurtEen31_1($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerEenBeurtEen) {
    if($Hand+2 >= $InzetSpelerEenBeurtNul) {
        return $RandomGetal;
    }else {
        return -1;
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

function SpelerEenBeurtTwee31_1($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerTweeBeurtEen){
    return 0;
} 