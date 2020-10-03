<?php
function strLength($x,$m,$y,$n,&$c,&$b){
	
	for($i=0;$i<$m;$i++)
        for($j=0;$j<$n;$j++) 
            $c[$i][$j] = 0;
	
	for($i=1;$i<$m;$i++){
		for($j=1;$j<$n;$j++){
			if($x[$i] == $y[$j]){
				$c[$i][$j] = $c[$i-1][$j-1] + 1;
				$b[$i][$j] = 'cross';
			}else if($c[$i-1][$j] >= $c[$i][$j-1]){
				$c[$i][$j] = $c[$i-1][$j];
				$b[$i][$j] = 'up';
			}else{
				$c[$i][$j] = $c[$i][$j-1];
				$b[$i][$j] = 'left';
			}
		}
	}
}
function recursive($b,$x,$i,$j){
    
	if($i && $j){
		if($b[$i][$j] == 'cross'){
            echo $x[$i];
            recursive($b,$x,$i-1,$j-1);            
		}else if($b[$i][$j] == 'up'){
			recursive($b,$x,$i,$j-1);
		}else{
			recursive($b,$x,$i-1,$j);
		}
	}
}
function LeastSubstring($arr){
    $x = str_split($arr[0]);
    array_unshift($x,0);
    $y = str_split($arr[1]);
    array_unshift($y,0);
    $c = [];
    $b = [];
    $m = count($x);
    $n = count($y);
    strLength($x,$m,$y,$n,$c,$b);
    echo "<pre>";
    print_r($c);
    print_r($b);

    recursive($b,$x,$m-1,$n-1);
}
LeastSubstring(["zzzfaaddae","aed"]);
LeastSubstring(["aazdffdbgacd","aad"]);
//var_dump(LeastSubstring(["aazdffdbgacd","aad"]));