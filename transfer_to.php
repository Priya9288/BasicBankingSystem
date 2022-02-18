<?php
require "assets/config.php";
$name=$_SESSION['name'];
$q="select name from users where not name='$name'";
$result=mysqli_query($con,$q);
if($name==null){ 
	echo"<script type='text/javascript'>
    setTimeout(function () {
        window.location.href= 'index.php';
     },1000);
    </script>"; 
}
else{
?>
<html>
<head>
   <title>Transfer</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/transfer_to.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<a href="index.php">
		<button class="home"><i class="fa fa-home"></i></button>
	</a>
	
	<div class="main">
		<div class="sub-main">
			<form action="credit_verification.php" method="post" class="transfer-form">
			
				<label for="receiver">Receiver</label>
				<select name="receiver">
					<?php while($row = $result->fetch_assoc()) { ?>
					<option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
					<?php } ?>
				</select>
				<br>
				<label for="amount">Amount </label>
				<input type="number" name="transfer">
				<br>
				<button  class="buttons submit" type="submit" name="submit" value="Credit">Transfer</button>
			</form>
			<form action="user.php" method="post">
				<div>
				<button  class="buttons back" type="submit" name="name" value="<?php echo $name ?>">BACK</button>
				</div>
			</form>	
		</div>	
	</div>

</body>
</html>

<?php } ?>