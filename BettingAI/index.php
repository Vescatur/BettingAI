<?php

$FactorChangePerRound = 0.3;
$Strategieen = array();

function VoegStrategieToe($PlayerID, $StrategieID) {
    global $Strategieen;
    $Strategieen[Count($Strategieen)] = $PlayerID . "_" . $StrategieID;
}

//include 'Strategie_7.php';
include 'Strategie_6.php';
include 'Strategie_31.php';


function Start() {
    global $Strategieen,$FactorChangePerRound;
    //$score[een][twee]
    $score = array();
    for ($i = 0; $i < Count($Strategieen); $i++) {
        $score[$i] = array();
        for ($o = 0; $o < Count($Strategieen); $o++) {
            $score[$i][$o] = 0;
        }
    }

    $ScoreFactor = array();
    for ($o = 0; $o < Count($Strategieen); $o++) {
        $ScoreFactor[$o] = 1.0;
    }
    
    //Battle($Strategieen[0],$Strategieen[0],0,0,6,7);

    for ($Strategie1 = 0; $Strategie1 < Count($Strategieen); $Strategie1++) {
        for ($Strategie2 = 0; $Strategie2 < Count($Strategieen); $Strategie2++) {
            if (!($Strategie1 == $Strategie2)) {
                for ($Random1 = 1; $Random1 <= 10; $Random1++) {
                    for ($Random2 = 1; $Random2 <= 10; $Random2++) {
                        for ($Hand1 = 1; $Hand1 <= 10; $Hand1++) {
                            for ($Hand2 = 1; $Hand2 <= 10; $Hand2++) {
                                $ScoreBattle = Battle($Strategieen[$Strategie1], $Strategieen[$Strategie2], $Random1, $Random2, $Hand1, $Hand2);
                                if (!($ScoreBattle == 0)) {
                                    $score[$Strategie1][$Strategie2] +=  $ScoreBattle;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    print_r($score);
    $ScorePerStrategie = GenereerScorePerStrategie($score);
    //for($i = 0; $i<Count($Strategien);$i++){
    //    for($o = 0; $i<Count($Strategien);$i++){
    //        $score[$i][$o] +=  Battle();
    //    }
    //}
    
            print("Druk op y om door te gaan, x om te stoppen\n");
        $anwser = trim(fgets(STDIN));
        $debounce = !($anwser == "x");
        
    while($debounce){
        $max = 0;
        
        $FactoredScore = GetFactoredScore($score,$ScoreFactor);
        print_r($FactoredScore);    
        $TotaleScore = GetTotaleScore($FactoredScore);
        print_r($TotaleScore);
        for ($o = 0; $o < Count($TotaleScore); $o++) {
            $max = max(max($TotaleScore),$max);
        }
        $min = 0;
        for ($o = 0; $o < Count($TotaleScore); $o++) {
            $min = min(min($TotaleScore),$min);
        }
        
        $max = max($max,-$min);
        print($max);
        
        for ($o = 0; $o < Count($TotaleScore); $o++) {
            $ScoreFactor[$o] += (($TotaleScore[$o]/$max)*$FactorChangePerRound);// (($TotaleScore[$o]/$max)*$FactorChangePerRound);
            if($ScoreFactor[$o] >= 2) {
                $ScoreFactor[$o] = 2;
            }elseif($ScoreFactor[$o] <= 0.01){
                $ScoreFactor[$o] == 0.01;   
            }
        }
        $FactoredScore2 = GetFactoredScore($score,$ScoreFactor);
        PrintCompleteScore($FactoredScore2,$ScoreFactor);        
        print("Druk op y om door te gaan, x om te stoppen\n");
        $anwser = trim(fgets(STDIN));
        $debounce = !($anwser == "x");
    }
} 

function GenereerScorePerStrategie($score){
    $StrategieScore = array();
    for($i = 0; $i<Count($score);$i++){
        $StrategieScore[$i] = 0;
        for($o = 0; $o<Count($score[$i]);$o++){
            $StrategieScore[$i] += $score[$i][$o];
        }
    }
}

function GetFactoredScore($score,$ScoreFactor){
    $FactoredScore = array();
    for ($i = 0; $i < Count($score); $i++) {
        $FactoredScore[$i] = array();
        for ($o = 0; $o < Count($score[$i]); $o++) {
            $FactoredScore[$i][$o] = $score[$i][$o]*$ScoreFactor[$i]*$ScoreFactor[$o];
        }
    }            
    return $FactoredScore;
}

function PrintCompleteScore($score,$ScoreFactor){
    print("\nAls Speler Een.\n");
    PrintScore($score,true);

    print("\nAls Speler Twee.\n");
    PrintScore($score,false);
    print("\nTotale van beide score\n");
    PrintTotaleScore($score,$ScoreFactor);
}

function GetTotaleScore($score){
    $TotaleScore = array();
    for ($i = 0; $i < Count($score); $i++) {        
        $totale = 0;
        for ($o = 0; $o < Count($score[$i]); $o++) {
            $totale -= $score[$o][$i];
        }
        $TotaleScore[$i] = (array_sum($score[$i]) + $totale);
    }
    return $TotaleScore;
}

function PrintTotaleScore($score,$ScoreFactor) {
    global $Strategieen;
    for ($i = 0; $i < Count($score); $i++) {
        print("|Strategie:");
        $maskBegin = "%5.5s";
        printf($maskBegin, $Strategieen[$i]);
        print("|Totaal:");
        $maskEinde = "%7.7s";
        
        $totale = 0;
            for ($o = 0; $o < Count($score[$i]); $o++) {
                $totale -= $score[$o][$i];
            }
            
        printf($maskEinde, array_sum($score[$i]) + $totale);
        print("|");
        printf($maskEinde, $ScoreFactor[$i]);
        print("|\n");
    }
}

function PrintScore($score,$Gelijk) {
    global $Strategieen;
    
    print("|               ");
    for ($i = 0; $i < Count($score); $i++) {
        $mask = "%7.7s"; 
            print("|");
            printf($mask, $Strategieen[$i]);
    }
    print("|              |\n");
    for ($i = 0; $i < Count($score); $i++) {
        print("|Strategie:");
        $maskBegin = "%5.5s";
        printf($maskBegin, $Strategieen[$i]);
        $mask = "%7.7s";

        for ($o = 0; $o < Count($score[$i]); $o++) {
            print("|");
            if($Gelijk) {
                printf($mask, $score[$i][$o]);
            }else{
                printf($mask, -$score[$o][$i]);
            }  
        }
        print("|Totaal:");
        $maskEinde = "%7.7s";
        if($Gelijk) {
            printf($maskEinde, array_sum($score[$i]));
        }else {
            $totale = 0;
            for ($o = 0; $o < Count($score[$i]); $o++) {
                $totale -= $score[$o][$i];
            }
            
            printf($maskEinde, $totale);
        }
        
        print("|\n");
    }
}

function Battle($StrategieNaam1, $StrategieNaam2, $Random1, $Random2, $Hand1, $Hand2) {

    $FuncMove1 = "SpelerEenBeurtNul$StrategieNaam1";
    $ReturnMove1 = $FuncMove1($Random1);

    if ($ReturnMove1 == -1) {
        return 0;
    } elseif (!($ReturnMove1 >= 5 && $ReturnMove1 <= 10)) {
        print("ERROR: in move 1.\n");
        print("ERROR: $ReturnMove1 \n");
        print("ERROR: " . $StrategieNaam1 . " " . $StrategieNaam2 . " " . $Random1 . " " . $Random2 . " " . $Hand1 . " " . $Hand2 . ".\n");
        return 0;
    }

    $FuncMove2 = "SpelerTweeBeurtNul$StrategieNaam2";
    $ReturnMove2 = $FuncMove2($Random2, $ReturnMove1);

    if ($ReturnMove2 == -1) {
        return 0;
    } elseif (!($ReturnMove2 >= 0 && $ReturnMove2 <= 10)) {
        print("ERROR: in move 2.\n");
        print("ERROR: $ReturnMove2 \n");
        print("ERROR: " . $StrategieNaam1 . " " . $StrategieNaam2 . " " . $Random1 . " " . $Random2 . " " . $Hand1 . " " . $Hand2 . ".\n");
        return 0;
    }

    $FuncMove3 = "SpelerEenBeurtEen$StrategieNaam1";
    $ReturnMove3 = $FuncMove3($Random1, $Hand1, $ReturnMove1, $ReturnMove2);

    if ($ReturnMove3 == -1) {
        return -($ReturnMove1);
    } elseif (!($ReturnMove3 >= 0 && $ReturnMove3 <= 10)) {
        print("ERROR: in move 3.\n");
        print("ERROR: $ReturnMove3 \n");
        print("ERROR: " . $StrategieNaam1 . " " . $StrategieNaam2 . " " . $Random1 . " " . $Random2 . " " . $Hand1 . " " . $Hand2 . ".\n");
        return 0;
    }

    $FuncMove4 = "SpelerTweeBeurtEen$StrategieNaam2";
    $ReturnMove4 = $FuncMove4($Random2, $Hand2, $ReturnMove1, $ReturnMove2, $ReturnMove3);

    if ($ReturnMove4 == -1) {
        return $ReturnMove1 + $ReturnMove2;
    } elseif (!($ReturnMove4 >= 0 && $ReturnMove4 <= 10)) {
        print("ERROR: in move 4.\n");
        print("ERROR: $ReturnMove4 \n");
        print("ERROR: " . $StrategieNaam1 . " " . $StrategieNaam2 . " " . $Random1 . " " . $Random2 . " " . $Hand1 . " " . $Hand2 . ".\n");
        return 0;
    }

    $FuncMove5 = "SpelerEenBeurtTwee$StrategieNaam1";
    $ReturnMove5 = $FuncMove5($Random1, $Hand1, $ReturnMove1, $ReturnMove2, $ReturnMove3, $ReturnMove4);

    if ($ReturnMove5 == -1) {
        return -($ReturnMove1 + $ReturnMove2 + $ReturnMove3);
    } elseif (!($ReturnMove5 == 0)) {
        print("ERROR: in move 5.\n");
        print("ERROR: $ReturnMove5 \n");
        print("ERROR: " . $StrategieNaam1 . " " . $StrategieNaam2 . " " . $Random1 . " " . $Random2 . " " . $Hand1 . " " . $Hand2 . ".\n");
        return ;
    }

    if ($Hand1 == $Hand2) {
        return 0;
        //return ($ReturnMove1 + $ReturnMove2 + $ReturnMove3 + $ReturnMove4);
    } elseif ($Hand1 > $Hand2) {
        return ($ReturnMove1 + $ReturnMove2 + $ReturnMove3 + $ReturnMove4);
    } else {
        return -($ReturnMove1 + $ReturnMove2 + $ReturnMove3 + $ReturnMove4);
    }
}

Start();
