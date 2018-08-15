<?php

class Database
{
	function CreateConnection()
	{  

		$servername = "localhost";
		$username   = "root";
		$password   = "";
		$dbname     = "db_konok";


		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		return $conn;

	}

}

?>
<!DOCTYPE html>
<html>
<head>

<style>
#myheader
{	



}

.jumbotron
{
	
	background-image: url("https://vignette2.wikia.nocookie.net/batmantheanimatedseries/images/0/08/BaC_54_-_Batman_and_Joker_Rollercoaster_Fight.jpg/revision/latest?cb=20151012014024");
}

</style>


	<title>Konok</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div   class="jumbotron"><h2 class="text-center" > Hi</h2></div>

<div class="container">
	<div class="row" >

		<div class="col-sm-12" >

		<h2 style="font-family: Gill Sans Extrabold, sans-serif";>Give purchase information!</h2>

			<?php

				$db = new Database();
				$conn = $db -> CreateConnection();

				if ($_SERVER["REQUEST_METHOD"] == "POST") {

					$username  = $_POST['username'];
			        $email     = $_POST['email'];
			        $password  = $_POST['password'];
			        $number    = $_POST['number'];
			        $domainname= $_POST['domainname'];

			          $pcode= $_POST['pcode'];

			           $query= $_POST['query'];
			           $payment= $_POST['payment'];
			           $address= $_POST['address'];


			        if (

			        	empty($username) ||
			            empty($email) ||
			            empty($password)||
			            empty($number)||
			            empty($domainname)||
			            empty($pcode) ||
			            empty($query)||
			            empty($payment)||
			            empty($address)

			        ) {
			        	echo "<span style='color: red;font-weight: bold;' >ERROR ! Field must not be empty..</span>";
			        }
			        else{

			         	$sql = "INSERT INTO tbl_user (username, email, password, number, domainname, pcode, query, payment, address) VALUES ('$username', '$email', '$password','$number', '$domainname', '$pcode' , '$query', '$payment' ,'$address')";
			         	if (mysqli_query($conn, $sql)) {
						    echo "<span style='color: green;font-weight: bold;' > User information recorded !</span>";
						} else {
						  	echo "<span style='color: red;font-weight: bold;' > User information not recorded !</span>";
						}

						mysqli_close($conn);

			        }

				}

			?>
			
			<div  id=" myheader">
			<form action="" method="post" >
				<div class="form-group">
					<label for="pwd">Username</label>
					<input type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label for="pwd">Secret Id For Sure:</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label for="pwd">Mobile NumbeR</label>
					<input type="text" class="form-control" name="number">
				</div>

				<div class="form-group">
					<label for="pwd">Domain Name</label>
					<input type="text" class="form-control" name="domainname">
				</div>

				<div class="form-group">
					<label for="pwd">Address</label>
					<input type="text" class="form-control" name="address">
				</div>

				<div class="form-group">
					<label for="pwd">Type PaymenT Method</label>
					<input type="text" class="form-control" name="payment">
				</div>

				<div class="form-group">
					<label for="pwd">Any querY</label>
					<input type="text" class="form-control" name="query">
				</div>


				<div class="form-group">
					<label for="pwd">Packege Code</label>
					<input type="text" class="form-control" name="pcode">
				</div>

 

				<div class="form-group">
					<input type="submit" name="submit" class="form-control btn btn-success">
				</div>


			</form>

			</div>
			
		</div>

		</body>

</html>