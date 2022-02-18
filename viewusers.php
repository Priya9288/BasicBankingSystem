<?php 
	require "assets//config.php";
	$q="select * from users ";
	$result=mysqli_query($con,$q);
	$row_count=mysqli_num_rows($result);
?>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>viewUser</title>
   <link rel="stylesheet" href="css//viewusers.css">
</head>
<body >
	<h1>Account Holder Information</h1>
    <table>
		<thead>
			<th>Sno.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Credit</th>
			<th></th>
		</thead>
		<tbody>
		<?php for($i=1;$i<=$row_count;$i++){?>
        <tr>
			<?php  
				$row=mysqli_fetch_array($result);
				if($row["name"!=null]){
					echo "<td> {$i}</td>
						  <td> {$row["name"]}</td>
						  <td> {$row["email"]}</td>
						  <td> {$row["current_balance"]} </td>
						  <td><form action='user.php' method='post' class='view'>
						      <button class='view-btn'type='submit' name='name' value='{$row["name"]}'>View</button>
					          </form>
						  </td>:					
					";}
			?>
		</tr>
		<?php }	?>
		</tbody>
	</table><br><br>
<div class="button">
	<a href="index.php">
    <button class="home-btn">HOME</button>
	</a>
</div>
</body>
</html>
