<?php
include '../kata_dasar.php';
function multiexplode ($delimiters,$string) {
	    $ready = str_replace($delimiters, $delimiters[0], $string);
	    $launch = explode($delimiters[0], $ready);
	    return  $launch;
	}
	function punctuationRemovalandstopwardRemoval($string){	    	
        $delimiter = array(' ','.',',','"',"'",'-
                             ','/','{','}','+','_','!','@','#','$','%','^','&','*','(',')','
                             ?','>','<','[',']','|','`','~',';',':','=','\n','\r','\t','\\');
        $value = str_replace($delimiter,"",$string);
		return $value;
	}

$output = '';
$flag   = 0;
$input  = $_POST['input'];
$token  = multiexplode(array(" ","\n"),$input);

$Finalinput = $token;
foreach ($Finalinput as $key => $v) {
	$casefolding = strtolower($v);
	$prs    = punctuationRemovalandstopwardRemoval($casefolding);
	
	if (preg_match('~[0-9]+~', $prs)) {
    	$flag = 1;
	}else{
		foreach ($arr as $word) {
		    $lev = levenshtein($prs, $word);
		    if ($lev == 0) {
		        $flag = 1;
		        break;
		    }
		    $data[$word] = $lev; 
		}	
	}
	
	if($flag == 1){
		$output .= '<span>'.$v.'</span> ';		
	}else{
		asort($data);
		$short = reset($data);
		$str = '';
		foreach ($data as $key => $value) {
			if($value== $short){
				$str.= $key.", ";
			}
		}	
		$output .= '<span style="color:red;" data-toggle="tooltip" title="'.$str.'">'.$v.'</span> ';		
	}
	$flag = 0;
}
echo $output;
?>