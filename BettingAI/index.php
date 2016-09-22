<?php
$Strategieen = array();
   
function VoegStrategieToe($PlayerID,$StrategieID){
    global $Strategieen;
    $Strategieen[Count($Strategieen)] = $PlayerID."_".$StrategieID;    
} 


//include 'Strategie7.php';
include 'Strategie6.php';
include 'StrategieVoorbeeld.php';

function Start(){
    global $Strategieen;
    //$score[een][twee]
    $score = array();
    for($i = 0; $i<Count($Strategieen);$i++){
        $score[$i] = array();
        for($o = 0; $o<Count($Strategieen);$o++){
            $score[$i][$o] = 0;
        }
    }
    print_r($score);
        
    for($Strategie1 =0;$Strategie1<Count($Strategieen);$Strategie1++){
        for($Strategie2 =0;$Strategie2<Count($Strategieen);$Strategie2++){
            for($Random1 =1;$Random1<=10;$Random1++){
                for($Random2 =1;$Random2<=10;$Random2++){
                    for($Hand1 =1;$Hand1<=10;$Hand1++){
                        for($Hand2 =1;$Hand2<=10;$Hand2++){
                            $score[$Strategie1][$Strategie2] += Battle($Strategieen[$Strategie1],$Strategieen[$Strategie2],$Random1,$Random2,$Hand1,$Hand2);
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
} 

function GenereerScorePerStrategie($score){
    $StrategieScore = array();
    for($i = 0; $i<Count($score);$i++){
        for($o = 0; $o<Count($score[$i]);$o++){
            $StrategieScore[$i] += $score[$i][$o];
        }
    }
}

function Battle($StrategieNaam1,$StrategieNaam2,$Random1,$Random2,$Hand1,$Hand2) {

    $FuncMove1 = "SpelerEenBeurtEen$StrategieNaam1";
    $ReturnMove1 = $FuncMove1($Random1,$Hand1);
    
    if($ReturnMove1 == -1) {
        return 0;
    }elseif(!($ReturnMove1 >= 1 && $ReturnMove1 <=10)) {
        print("ERROR: in move 1.\n");
        print("ERROR: $ReturnMove1 \n");
        print("ERROR: ".$StrategieNaam1." ".$StrategieNaam2." ".$Random1." ".$Random2." ".$Hand1." ".$Hand2.".\n");
        return 0;
    }
        
    $FuncMove2 = "SpelerTweeBeurtEen$StrategieNaam2";
    $ReturnMove2 = $FuncMove2($Random2,$Hand2,$ReturnMove1);
    
    if($ReturnMove2 == -1) {
        return 0;
    }elseif(!($ReturnMove2 >= 0 && $ReturnMove2 <=10)) {
        print("ERROR: in move 2.\n");
        print("ERROR: $ReturnMove2 \n");
        print("ERROR: ".$StrategieNaam1." ".$StrategieNaam2." ".$Random1." ".$Random2." ".$Hand1." ".$Hand2.".\n");
        return 0;
    }
    
    $FuncMove3 = "SpelerEenBeurtTwee$StrategieNaam1";
    $ReturnMove3 = $FuncMove3($Random1,$Hand1,$ReturnMove1,$ReturnMove2);
    
    if($ReturnMove3 == -1) {
        return -$ReturnMove3;
    }elseif(!($ReturnMove3 == 0)){
        print("ERROR: in move 3.\n");
        print("ERROR: $ReturnMove3 \n");
        print("ERROR: ".$StrategieNaam1." ".$StrategieNaam2." ".$Random1." ".$Random2." ".$Hand1." ".$Hand2.".\n");
        return -$ReturnMove3;
    }
    
    if($Hand1==$Hand2) {
        return 0;
    }elseif ($Hand1>$Hand2) {
        return ($ReturnMove1+$ReturnMove2);
    }else{
        return -($ReturnMove1+$ReturnMove2);
    }
    

}


Start();
