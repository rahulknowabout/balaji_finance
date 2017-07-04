<?php // include($_SERVER['DOCUMENT_ROOT'].'/balaji_fin/admin/controller/adduser.php');
?>
<form action="addsu.php" method="post">
	<table>
	<?php echo adduser(); ?>
		<tr>
			<td>
				<input type="submit" name="sub" id = "sub" value="Add"/>
			</td>
		</tr>
	</table>
</form>
