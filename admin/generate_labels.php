<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ASEshopping</title>
  <meta name="description" content="aseshopping labels">
  <meta name="author" content="Samira">
  <style>
    .box{
    	border:1px solid #333;
    	border-radius:3px;
    	padding:10px;
    	width:600px;
    }
    .td{
    	display:inline-table;
    	width:250px;
    }
    .label{
    	font-weight:600;
    	margin-right:20px;
    }
    hr{
       margin:50px 0px;
       width:600px;
    }
  </style>
  <?php
  if(isset($_POST["label_info"])){
  $label_info=str_replace("},}", "}}", $_POST["label_info"]);
  $json=json_decode($label_info,true);
  ?>
</head>
<body id="content">
	<?php for($i=0;$i<sizeof($json);$i++){ ?>
	<table class="box">
		<tr>
		<td>
		  <table>
		   <tbody>
			<tr>
				<td class="label">FROM:</td>
				<td>F&F<br/><?php echo $json[$i]["country"]; ?></td>
			</tr>
			<tr>
				<td class="label">REF NO:</td>
				<td><?php echo $json[$i]["AwbNum"]; ?></td>
			</tr>
			<tr>
				<td class="label">PCS:</td>
				<td>1</td>
			</tr>
		   </tbody>
	     </table>
		</td>
		<td >
			<table>
		        <tbody>
					<tr>
						<td class="label">TO:</td>
						<td><?php echo $json[$i]["name"]; ?><br/><?php echo $json[$i]["PObox"]; ?> <br/>BAKU, AZERBAIJAN<td>
					</tr>
					<tr>
						<td class="label">WEIGHT:</td>
						<td><?php echo $json[$i]["weight"]; ?></td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	</table>
	<hr>
<?php }
}else{
	echo "Please, go to package page and select packages to make labels";
}?>
<div><a href="packages.php">BACK to PACKAGES</a></div>
</body>
</html>