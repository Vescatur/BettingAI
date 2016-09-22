<?php

for ($number = 1; $number < 11; $number++)
{
    print("Hand is: " . $number . " ; ");
    print("Inzet is: " . SpelerEenBeurtEen7_1(rand(1, 10), $number) . "\n");
}




/* NOG NIKS */

function IsAlive6_2()
{
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

/**
 * Doet de eerste beurt voor speler 1
 * $RandomGetal == Letterlijk rand(1, 10);
 * $Hand == Wat Speler 1 heeft
 * Returns de inzet tussen (1, 10)
 */
function SpelerEenBeurtEen7_1($RandomGetal, $Hand)
{

    //Bij een lage hand weinig of niks inzetten
    //Bij een middelmatige hand gokken, niet te laag en niet te hoog inzetten
    //Bij een hoge hand hoog inzetten.

    if ($Hand == 1)
    {
        return 0;
    } 
    else
    {
        $RandomGetal = -2 + ceil(($RandomGetal / 10) * 4);
        
        if ($RandomGetal + ceil(pow($Hand, 2) * 0.1) <= 10 && $RandomGetal + ceil(pow($Hand, 2) * 0.1) >= 3)
        {
            return ceil(pow($Hand, 2) * 0.1) + $RandomGetal;
        }
        else
        {
            return ceil(pow($Hand, 2) * 0.1);
        }
        
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

function SpelerTweeBeurtEen7_1($RandomGetal, $Hand, $InzetSpelerEen)
{
    if ($Hand >= $InzetSpelerEen)
    {
        return $RandomGetal;
    } else
    {
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

function SpelerEenBeurtTwee7_2($RandomGetal, $Hand, $InzetSpelerEen, $InzetSpelerTwee)
{
    return 0;
}
