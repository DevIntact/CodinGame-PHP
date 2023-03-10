<?php

// https://www.codingame.com/training/medium/scrabble

fscanf(STDIN, "%d", $N);
$r=['aeionrtlsu'=>1,'dg'=>2,'bcmp'=>3,'fhvwy'=>4,'k'=>5,'jx'=>8,'qz'=>10];
for ($i = 0; $i < $N; $i++)
{
    $W = stream_get_line(STDIN, 30 + 1, "\n");
    $a=str_split($W);
    $g[$W]=$a;
}
$LETTERS = array_count_values(str_split(stream_get_line(STDIN, 7 + 1, "\n")));

foreach($g as $k=>$v) {
    
    $s=$LETTERS;

    foreach($v as $l) {
        if(!array_key_exists($l,$s) || $s[$l]==0){
            unset($g[$k]);
            break;
        } else $s[$l]--;
    }
    
}

foreach($g as $k=>$v){
    $d=0;
    foreach($v as $l){
        foreach($r as $j=>$p){
            if(strpos($j,$l)!==false){
                $d+=$p;
                break;
            }
        }
    }
    $g[$k]=$d;
}

echo array_search(max($g),$g);