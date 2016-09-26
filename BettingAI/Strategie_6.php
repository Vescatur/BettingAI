<?php

VoegStrategieToe(6,2);

/*
 * Dit is als je als de eerste speler speelt. 
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * 
 * return -1 om te stoppen                                                      Je verliest dan niks
 * return een getal van 5 tot en met 10 om door te gaan. Dit is je inzet.       Je hebt kans om je inzet te verliezen
 */

function SpelerEenBeurtNul6_2($RandomGetal) {
    if($RandomGetal == 5) {
        return -1;
    }else{
        return 5+($RandomGetal/2);
    }
}

/*
 * Dit is als je als de eerste speler speelt. 
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * 
 * return -1 om te stoppen                                                      Je verliest dan niks
 * return 0 tot en met 10 om te verhogen. Dit is het aantal waarmee je verhoogt.     Je kan je inzet verliezen
 */

function SpelerTweeBeurtNul6_2($RandomGetal,$InzetSpelerEenBeurtNul) {
    if($InzetSpelerEenBeurtNul == 10) {
        return -1;
    }else {
       return 10-$InzetSpelerEenBeurtNul;      
    }
}

/*
 * Dit is als je als de eerste speler speelt. 
 * 
 * $RandomGetal is een random getal van 1 tot en met 10
 * $Hand is een getal van 1 tot en met 10
 * 
 * return -1 om te stoppen                                                                Je verliest dan je inzet
 * return 0 tot en met 10 om te verhogen. Dit is het aantal waarmee je verhoogt.     Je kan je inzet verliezen
 */

function SpelerEenBeurtEen6_2($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul) {
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


function SpelerTweeBeurtEen6_2($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerEenBeurtEen) {
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

function SpelerEenBeurtTwee6_2($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerTweeBeurtEen){
    return 0;
} 

//----------------------------------------------------------------------------\\

VoegStrategieToe(6,3);

function SpelerEenBeurtNul6_3($RandomGetal) {
    if($RandomGetal == 5) {
        return -1;
    }else{
        return 5+($RandomGetal/2);
    }
}

function SpelerTweeBeurtNul6_3($RandomGetal,$InzetSpelerEenBeurtNul) {
    if($InzetSpelerEenBeurtNul == 10) {
        return -1;
    }else {
       return 10-$InzetSpelerEenBeurtNul;      
    }
}

function SpelerEenBeurtEen6_3($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul) {
    if($Hand >= 6) {
        if($Hand+(($RandomGetal-5)/2)>=1 && $Hand+(($RandomGetal-5)/2)<=10){
            return $Hand+(($RandomGetal-5)/2);
        }else {
            return $Hand;
        }
    }else {
        return -1;
    }
}

function SpelerTweeBeurtEen6_3($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerEenBeurtEen) {
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

function SpelerEenBeurtTwee6_3($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerTweeBeurtEen){
    return 0;
} 

//----------------------------------------------------------------------------\\

VoegStrategieToe(6,4);

function SpelerEenBeurtNul6_4($RandomGetal) {
    return 5;
}

function SpelerTweeBeurtNul6_4($RandomGetal,$InzetSpelerEenBeurtNul) {
    return 1;
}

function SpelerEenBeurtEen6_4($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul) {
    if($Hand >= (($InzetSpelerEenBeurtNul+$InzetSpelerTweeBeurtNul)/2)){
        return $Hand;
    }else {
        return -1;
    }
}

function SpelerTweeBeurtEen6_4($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerEenBeurtEen) {
    if($Hand >= (($InzetSpelerEenBeurtNul+$InzetSpelerTweeBeurtNul+$InzetSpelerEenBeurtEen)/3)){
        return $Hand;
    }else {
        return -1;
    }
}

function SpelerEenBeurtTwee6_4($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerTweeBeurtEen){
    return 0;
} 

//----------------------------------------------------------------------------\\

VoegStrategieToe(6,5);

function SpelerEenBeurtNul6_5($RandomGetal) {
    return 5;
}

function SpelerTweeBeurtNul6_5($RandomGetal,$InzetSpelerEenBeurtNul) {
    if($InzetSpelerEenBeurtNul == 5){
        return 5;
    }else{
        return 1;
    }
}

function SpelerEenBeurtEen6_5($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul) {
    if($InzetSpelerTweeBeurtNul == 1 && ($Hand > (($InzetSpelerEenBeurtNul+$InzetSpelerTweeBeurtNul)/2)) ){
        return ($InzetSpelerEenBeurtNul+$InzetSpelerTweeBeurtNul);
    }else {
        return -1;
    }
}

function SpelerTweeBeurtEen6_5($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerEenBeurtEen) {
    if($InzetSpelerEenBeurtNul == 5){
        if($InzetSpelerEenBeurtEen < $Hand){
            return 10;
        }else{
            return -1;
        }
    }
}

function SpelerEenBeurtTwee6_5($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerEenBeurtEen,$InzetSpelerTweeBeurtEen){
    if($Hand>$InzetSpelerTweeBeurtEen){
        return 0;    
    }else {
        return 0;
    } 
} 

//----------------------------------------------------------------------------\\

VoegStrategieToe(6,6);

function SpelerEenBeurtNul6_6($RandomGetal) {
    return 5;
}

function SpelerTweeBeurtNul6_6($RandomGetal,$InzetSpelerEenBeurtNul) {
    return 1;
}

function SpelerEenBeurtEen6_6($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul) {
    if($Hand >= 7){
        return 10;
    }else {
        return -1;
    }
}

function SpelerTweeBeurtEen6_6($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerEenBeurtEen) {
    if($Hand >= 8){
        return 10;
    }else {
        return -1;
    }
}

function SpelerEenBeurtTwee6_6($RandomGetal,$Hand,$InzetSpelerEenBeurtNul,$InzetSpelerTweeBeurtNul,$InzetSpelerEenBeurtEen,$InzetSpelerTweeBeurtEen){
    return 0;
} 