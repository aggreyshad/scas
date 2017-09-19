<?php

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ((array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/scas/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<li><a href=\"$base\"><i class=\"fa fa-dashboard\"></i> $home</a></li>");

    // Find out the index for the last value in our path array
	$last = array_keys($path);
    $last = end($last);
	$first = array_shift($path);

    // Build the rest of the breadcrumbs
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

        // If we are not on the last index, then display an <a> tag
        if ($x != $last)
            $breadcrumbs[] = "<li><a href=\"$base$crumb\">$title</a></li>";
        // Otherwise, just display the title (minus)
		
		elseif($x != $first)
            ;//$breadcrumbs[] = "<li><a href=\"$base$crumb\">$title</a></li>";
		
        else
            $breadcrumbs[] = "<li>$title</li>";
    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}

?>



			<?php  //another way to make crumbs
		  	//$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
			//foreach($crumbs as $crumb){echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
			//}
			?>
			
<?php


//roles
$session=$_SESSION['user_session'];
function get_user_role($session){
$stmt = $db_con->prepare("SELECT * FROM users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if ($row[user_role]==0) return "Admin"; 
elseif ($row[user_role]==1) return "Teacher"; 
elseif ($row[user_role]==2) return "Student";
}

?>

<?php
function best_eight($array_of_aggregates){
	sort($array_of_aggregates);
	$best_eight=NULL;
	$ctr=0;
	
	$arrlength = count($array_of_aggregates);
	for($x = 0; $x <  $arrlength; $x++) {
		//Calculate best 8
		if($ctr <8){
		$best_eight += $array_of_aggregates[$x];
		$ctr++;
		}
	}
	return $best_eight;
}

?>

<?php
function subjects_for_combination($array_of_subjects,$array_of_aggregates,$array_of_subjects_names){
	$subject_4_comb=NULL;
	$subject_4_comb_name=NULL;
	$agg_4_comb_subjects=NULL;
	$max_agg_for_subject=5;
	
	//****************************************************
	$arrlength1 = count($array_of_subjects);
	for($x = 0; $x <  $arrlength1; $x++) {
		//Calculate best 8
		if ($x==0)$subject_4_comb .= $array_of_subjects[$x];
		else $subject_4_comb .= ",".$array_of_subjects[$x];
	}
	
	//*****************************************************
	$arrlength2 = count($array_of_aggregates);
	for($x = 0; $x <  $arrlength2; $x++) {
		//Calculate best 8
		if ($x==0)$agg_4_comb_subjects .= $array_of_aggregates[$x];
		else $agg_4_comb_subjects .= ",".$array_of_aggregates[$x];
	}
	
	//****************************************************
	$arrlength3 = count($array_of_subjects_names);
	for($x = 0; $x <  $arrlength3; $x++) {
		//Calculate best 8
		if ($x==0)$subject_4_comb_name .= $array_of_subjects_names[$x];
		else $subject_4_comb_name .= ",".$array_of_subjects_names[$x];
	}
	
	//****************************************************
	
	
	echo "<br /> Subject from which you can get combination: ".$subject_4_comb_name;
	echo "<br /> Subject from which you can get combination: ".$subject_4_comb;
	echo "<br /> Aggregates from which you can get combination: ".$agg_4_comb_subjects;

}

?>