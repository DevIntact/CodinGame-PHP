<?php

// https://www.codingame.com/training/easy/rock-paper-scissors-lizard-spock

function check($v) {
    $r=[
        'R'=>['L','C'],
        'C'=>['P','L'],
        'P'=>['R','S'],
        'L'=>['P','S'],
        'S'=>['R','C']
    ];
    if($v[0][1] == $v[1][1]) {
        if($v[0][0]<$v[1][0])
            $e=$v[0];
        else $e=$v[1];
    }elseif(in_array($v[1][1],$r[$v[0][1]])) {
        $e=$v[0];
    } else $e=$v[1];

    return $e;
}

fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%d %s", $n, $s);
    $g[]=[$n,$s];
}

while(count($g)>1) {

    $g=array_chunk($g,2);

    foreach($g as $k=>$v) {
        $z=check($v);
        $h[$z[0]][]=($z[0]==$v[0][0]?$v[1][0]:$v[0][0]);
        $g[$k]=$z;
    }
    
}

echo $g[0][0]."\n".join(' ',$h[$g[0][0]]);