<?php 
require "assets/config.php";
$name=$_POST['name'];
$q="select * from users where name='$name'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result);
$email=$row['email'];
$current_balance=$row['current_balance'];
$_SESSION['name']=$name;

if($_SESSION['name']!=null){
?>

<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $name?></title>
	<link rel="stylesheet" href="css//user.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body>
		<a href="index.php">
		<button class="home"><i class="fa fa-home"></i></button>
		</a>
	   <div class="main">
			<table>
				<tr>
					<th>Name</th>
					<td><?php echo $name?></td>
				</tr>
				<tr>
					<?php  
						$row=mysqli_fetch_array($result);
					?>
					<th>Email</th>
					<td><?php echo $email?></td>
				</tr>
			<tr>
					<?php  
						$row=mysqli_fetch_array($result);
					?>
					<th> Credits</th>
					<td><?php echo $current_balance?></td>
				</tr>
			</table>
			<br>
			<div>
			<a href="transfer_to.php">
			<button type="button" class="buttons">Transfer To</button>
			</a>
			</div>
			<div>
				<a href="ministatement.php">
				<button type="button" class="buttons">Mini Statement</button>
				</a>
			</div>
		</div>		
    </body>
</html>
<?php }


else{
	echo"<script type='text/javascript'>
    setTimeout(function () {
        window.location.href= 'index.php';
     },1000);
    </script>"; 
	}
?>