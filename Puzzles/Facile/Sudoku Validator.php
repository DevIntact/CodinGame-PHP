<?php

// https://www.codingame.com/training/easy/sudoku-validator

$e=0;
for ($i = 0; $i < 9; $i++)
{
    $inputs = explode(" ",trim(fgets(STDIN)));

    if(count(array_unique($inputs))!=9 || array_sum($inputs)!=45) {
        echo 'false';
        die;
    }
    foreach($inputs as $j=>$v) {
        $g[$j][$i]=$v;
    }
    $p=array_chunk($inputs,3);
    

    foreach($p as $x=>$v) {
        $m[$x][]=$v;
    }
    
}

foreach($g as $v) {
    if(count(array_unique($v))!=9 || array_sum($v)!=45) {
        echo 'false';
        die;
    }
}

foreach($m as $v) {
    $v=array_chunk($v,3);
   
    foreach($v as $t) {
        $d=0;
        foreach($t as $c) $d+=array_sum($c);
        if($d!=45) {
            echo 'false';
            die;
        }
    }
    
}

echo 'true';