<?

// https://www.codingame.com/training/easy/frame-the-picture

$f = str_split(stream_get_line(STDIN, 10 + 1, "\n"));

fscanf(STDIN, "%d %d", $h, $w);

for ($i = 0; $i < count($f); $i++) {
    $s='';
    for ($j = 0; $j <= $i; $j++) $s.=$f[$j];
    $g[]=$s.str_repeat($f[$i],$w+2+count($f)*2-strlen($s)*2).strrev($s);
}

$g[]=$s.str_repeat(' ',$w+2+count($f)*2-strlen($s)*2).strrev($s);

echo join("\n",$g)."\n";

for ($i = 0; $i < $h; $i++) {
    $line = stream_get_line(STDIN, 100 + 1, "\n");
    echo $s.' '.$line.' '.strrev($s)."\n";
}

echo join("\n",array_reverse($g));