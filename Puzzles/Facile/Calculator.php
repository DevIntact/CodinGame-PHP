<?php

// https://www.codingame.com/training/easy/calculator

fscanf(STDIN, "%d", $n);
$s='';
for ($i = 0; $i < $n; $i++) $s.= trim(fgets(STDIN));

$s=str_replace(['x','AC'],['*','A'],$s);
$z=[];
$a='';

for ($i = 0; $i < strlen($s); $i++)
{
    if(ctype_digit($s[$i])) {
        $a.=$s[$i];
        echo "$a\n";
    }
    else {

        if($s[$i]=='A') {

            echo "0\n";
            $z=[];
            $a='';

        } else {

            if(!empty($a)) $z[]=$a;

            if(in_array(end($z),['+','-','/','*'])) array_pop($z);
            
            $t=round(eval('return '.join($z).';'),3);
            echo "$t\n";

            if($s[$i]=='=') {
                if($i+1<strlen($s) && $s[$i+1]=='='){
                    $x=$z[count($z)-2];
                    $y=$z[count($z)-1];
                    $z[]=$x;
                    $z[]=$y;
                } elseif($i+1<strlen($s) && !ctype_digit($s[$i+1])){ 
                    $z=[$t];
                } else $z=[];
            } elseif($s[$i]=='/' || $s[$i]=='*'){
                array_unshift($z,'(');
                array_push($z,')');
                $z[]=$s[$i];
            } else $z[]=$s[$i];

            $a='';

        }
    }
}