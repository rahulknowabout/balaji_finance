<?php //include($_SERVER['DOCUMENT_ROOT'].'/balaji_fin/admin/controller/functions.php');
	if( isset( $_GET['artc'] ) ) {
		$rowa = getartical( $_GET['artc'] );?>
		
		 <tr><th><input type = "checkbox" class="flat" name="all" id="all"  onclick="checkall()"/></th><th>Select All</th></tr><?php
	if( count($rowa) > 0 ) {
		 foreach( $rowa as $row) { 
		 	if( $row['status'] == 1) { ?>
		<tr>
			<td>
            	<input type = "checkbox"  class="flat" name="artical[]" id="artical" value="<?php echo $row['id']; ?>" /> 
			</td>
			<td>
				<?php echo "".$row['title']."(".$row['alias'].")"; ?>
			</td>
        </tr>
 <?php } } }
} ?>