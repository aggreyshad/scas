<?php 
$numbers = array( 3 , 1, 4, 6, 3, 5, 6, 4, 2, 6, 1);
sort($numbers);
$best_eight=NULL;
$ctr=0;

$arrlength = count($numbers);
for($x = 0; $x <  $arrlength; $x++) {
	//Calculate best 8
	if($ctr <8){
	$best_eight += $numbers[$x];
	$ctr++;
	}
}

echo "Aggregate in Best 8 is: ".$best_eight."<br />";

?>