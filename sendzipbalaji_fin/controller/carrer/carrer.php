<?php
function delete() {
     if( isset( $_GET['id'] ) ) {
	  $whe = "WHERE id = ".$_GET['id']."";
	  runquery('DELETE','','jobsapply','',$whe);
	 }
} 

 if( isset( $_GET['id'] ) && isset( $_GET['del'] ) ) {
          delete();
 }
?>