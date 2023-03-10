<?php

// https://www.codingame.com/training/easy/isbn-check-digit

fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    $isbn = stream_get_line(STDIN, 20 + 1, "\n");
    $w=str_split($isbn);
    $y=0;

    $e=strlen($isbn)+1;
    $b=($e==11?11:10);
    $a=array_pop($w);
    $d=0;
    if($b==11) {
        foreach($w as $k=>$v) {
            if(!ctype_digit($v)){
                $y=1;
                break;
            }
            $d+=$v*($b-1-$k);
        }
    } else {
        foreach($w as $k=>$v) {
            if(!ctype_digit($v)){
                $y=1;
                break;
            }
            $d+=($k%2>0?$v*3:$v);
        }
    }
    
    $z=($d%$b>0?$b-($d%$b):0);
    $a=($a=='X'?10:$a);

    if($z!=$a || (strlen($isbn)!=10 && strlen($isbn)!=13) || $y==1){
        $g[]=$isbn;
    }

}

echo count($g)." invalid:\n".join("\n",$g);