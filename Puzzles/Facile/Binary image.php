<?

// https://www.codingame.com/training/easy/binary-image

fscanf(STDIN, "%d", $h);
for ($i = 0; $i < $h; $i++)
{
    $r = explode(' ',stream_get_line(STDIN, 200 + 1, "\n"));
    $g[]=array_sum($r);
    $z[]=$r;
}

if(count(array_unique($g))!=1) {
    echo 'INVALID';
} else {
    foreach($z as $v) {
        $s='';
        foreach($v as $k=>$m) $s.=str_repeat($k%2>0?'O':'.',$m);
        echo "$s\n";
    }
}