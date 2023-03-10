<?php

// https://www.codingame.com/training/easy/artificial-emotional-intelligence

$name = fgets(STDIN);

$v='aeiouy';
$c='bcdfghjklmnpqrstvwxz';
$adjList = explode(' ',strtolower("Adaptable Adventurous Affectionate Courageous Creative Dependable Determined Diplomatic Giving Gregarious Hardworking Helpful Hilarious Honest Non-judgmental Observant Passionate Sensible Sensitive Sincere"));
$goodList = explode(', ',strtolower("Love, Forgiveness, Friendship, Inspiration, Epic Transformations, Wins"));
$badList = explode(', ',strtolower("Crime, Disappointment, Disasters, Illness, Injury, Investment Loss"));

$m=array_slice(str_split(preg_replace('/[^'.$v.']/','',strtolower($name))),0,2);
$n=array_slice(array_unique(str_split(preg_replace('/[^'.$c.']/','',strtolower($name)))),0,3);

if(count($m)<2 || count($n)<3)
    echo "Hello $name.";
else {

    $m[0]=$goodList[strpos($v,$m[0])];
    $m[1]=$badList[strpos($v,$m[1])];
    
    $n[0]=$adjList[strpos($c,$n[0])];
    $n[1]=$adjList[strpos($c,$n[1])];
    $n[2]=$adjList[strpos($c,$n[2])];

    echo "It's so nice to meet you, my dear $n[0] $name.\nI sense you are both $n[1] and $n[2].\nMay our future together have much more $m[0] than $m[1].";
}