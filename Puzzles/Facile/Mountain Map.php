<?php

// https://www.codingame.com/training/easy/mountain-map

fscanf(STDIN, "%d", $n);
$inputs = explode(" ", fgets(STDIN));
for ($i = 0; $i < $n; $i++)
{
    $height = intval($inputs[$i]);
    $g[]=$height;

}

$d=max($g);
$e=0;
while($d>0) {
    foreach($g as $k=>$v) {
        if($v>=$d) {
            $h[$e][$k]=str_repeat(' ',$d-1).'/'.str_repeat(' ',($v-$d)*2).'\\'.str_repeat(' ',$d-1);
        } else {
            $h[$e][$k]=str_repeat(' ',$v*2);
        }
    }
    $d--;
    $e++;
}

foreach($h as $v) echo rtrim(join($v))."\n";