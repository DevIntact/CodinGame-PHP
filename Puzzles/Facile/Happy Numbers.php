<?php

// https://www.codingame.com/training/easy/happy-numbers

fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    $x = stream_get_line(STDIN, 128 + 1, "\n");
    $g=[$x];
    while($x!=1) {
        $x=str_split($x);
        $d=0;
        foreach($x as $v){
            $d+=$v**2;
        }
        $x=$d;
        if(in_array($x,$g))break;
        $g[]=$x;
    }
    
    echo $g[0].' :'.($x==1?')':'(')."\n";

}
