<?php
$str = "T4 l16 _36 510 _27 s26 _11 320 414 {6 }39 C2 T0 m28 317 y35 d31 F1 m22 g19 d38 z34 423 l15 329 c12 ;37 19 h13 _30 F5 t7 C3 325 z33 _21 h8 n18 132 k24";
$words = preg_split('/\s+/', $str);
//print_r($words);

$c=[];
$index=[];

$pattern = '/^([a-zA-Z\{\}\[\]\(\)\_\;]+)(\d+)/';

foreach ($words as $word) {
    if (preg_match($pattern, $word, $matches)) {
        $c[]=$matches[1];
        $index[]=$matches[2];
    }
}

//echo "C: ";
//print_r($c);
//echo "<br>";
//echo "Index: ";
//print_r($index);

$combined = [];
foreach ($c as $i => $c1) {
    $combined[] = $c1 . $index[$i];
}

usort($combined, function($a, $b) {
    $numA = (int)substr($a, 1);
    $numB = (int)substr($b, 1);
    return $numA - $numB;
});

foreach ($combined as &$item) {
    $item = preg_replace('/\d+/', '', $item);
}

foreach ($combined as $itemm) {
    echo $itemm . " ";
}






