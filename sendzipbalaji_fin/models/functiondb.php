<?php 
function runquery( $qtype="",$scol = "",$tablename="",$sva = array(),$whe="",$extra = "" )  {
	if($qtype == "SELECT") {
		 $qer = $qtype." ".$scol." FROM ".$tablename." ".$whe."";
		//echo $qer;	
		 //die();
		 $result = mysql_query($qer);
		 if( $extra == "num_rows") {
		 	return mysql_num_rows($result);
		 }
		 else {
		 
		 	while ( $row = mysql_fetch_assoc( $result ) ) {
		 		$rowa[] = $row;
		 	}
			if( isset( $rowa ) ) {
		 	return $rowa;	
			}
		}					 
	}							  
								   
	if($qtype == "INSERT") {
		 foreach($sva as $k => $v) {
		 	$colf[] = $k;
		 	$colv[] = $v;
		 }	
		$strf = implode(",",$colf);
		ltrim($strf,",");
		$strv = implode(",",$colv);
		ltrim($strv,",");
	    $qer = $qtype." INTO ".$tablename."(".$strf.")VALUES(".$strv.")";
		echo $qer;
		//die();
		
	    $result = mysql_query($qer);
		return $result;
	    }
	  if($qtype == "UPDATE") {
		foreach($sva as $k => $v) {
			$sup[] = $k."=".$v;
		}
		$svp = implode(",",$sup);
		ltrim($svp,",");
		$qer = "".$qtype." ".$tablename." SET ".$svp." ".$whe."";
		//echo $qer;
		//die();
		$result = mysql_query($qer);
		}

	if($qtype == "DELETE") {
	$qer = "".$qtype." ".$scol." FROM ".$tablename." ".$whe."";	
	//echo $qer;
	$result = mysql_query($qer);
	}
	if( $qtype == "ALTER") {
	$qer = "".$qtype." TABLE ".$scol." ".$tablename." ".$whe."";
	$result = mysql_query($qer);
	}
	//echo "<pre>"; print_r($_REQUEST);
	//echo $qer."<hr><hr>";
}
?>