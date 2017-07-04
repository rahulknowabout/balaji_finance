<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?php
function runqueryb($qtype="",$tablename="",$str="",$val="",$whe="")
							 {
							 
							    if($qtype == "INSERT")
								 {
								 
								 $qer = "".$qtype." INTO ".$tablename."(".$str.")VALUES(".$val.")";
								 mysql_query($qer);
								// echo $qer;
								 return $qer;
								 
								
								 }
								 
								 if($qtype == "UPDATE")
								  {
								       
								    $qer = "".$qtype." ".$tablename." SET ".$str." ".$whe."";
									mysql_query($qer);
									//echo $qer;
								  }
								  
								 if($qtype == "SELECT")
								 
								  {
								   
								  $qer ="".$qtype." * FROM ".$tablename." ".$whe."";
								  
								  $result1 = mysql_query($qer);
								  //echo $qer;
								  return $result1;
								  
								  
								  //return $qer;
								  
								  
								  
								
								  
								  }
								  
								  
								if($qtype == "DELETE")
								
								{
								 
								 $qer = "".$qtype." FROM ".$tablename." ".$whe."";
								 
								 mysql_query($qer);
								 
								
								 }   
							 } 
								 
		?>				
</body>
</html>
