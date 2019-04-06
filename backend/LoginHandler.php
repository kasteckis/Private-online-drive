<?php
//Prideda headerius, jei ne ant localhosto turetu ju nereiketi nes jie prideti
//.htaccess faile, taciau localhostas ju neleidzia todel reiktu situs naudoti
//tik localiai o serveri turetu veikti .htaccess failas
//Jeigu meta CORS pranesimus problemos su headeriais
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Content-Type");

require '../includes/config.php';
require '../includes/mysql_connection.php';

//$type = $_GET['tp'];
//if($type=='signup') signup();

//Paima duomenis is POST
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


//Gauna informacija i masyva, jame surasyta username ir password
$c = $_POST['credentials'];
$a = $c['username'];
$b = $c['password'];

if (empty($a) && empty($b)) die();



	$username = mysqli_real_escape_string($conn, $a); //Nuo sql injection
	$password = mysqli_real_escape_string($conn, $b); //Nuo sql injection
	$sqlGetUserInformation = "SELECT * FROM Users WHERE nick='$username'";
	$getUserInformationResults = mysqli_query($conn, $sqlGetUserInformation);
	if (mysqli_num_rows($getUserInformationResults) > 0)
	{
			// output data of each row
			while($row = mysqli_fetch_assoc($getUserInformationResults))
			{
			if(password_verify($password, $row['password']))
			{
				$_SESSION['id'] = $row['id'];
				$_SESSION['nick'] = $row['nick'];
				$_SESSION['status'] = $row['status'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['suspended'] = $row['suspended'];
				$_SESSION['lastLogged'] = $row['lastLogged'];

				//Atnaujina kada paskutini kartą buvo jungtasi.
				$tempId = $row['id'];
				$currentDate = date('Y-m-d H:i:s');

				$sqlUpdateUserLastLoggedDate = "UPDATE Users SET lastLogged='$currentDate' WHERE id='$tempId'";
				mysqli_query($conn, $sqlUpdateUserLastLoggedDate);

				//return session id and username
				$data['username'] = $a;

				http_response_code(200);
				echo json_encode($data);
				//header('Location: ../manager.php');
			}
			}
	}
	else
	{
		http_response_code(400);
		//Tas pats lyg įvestas blogas slaptažodis.
		echo json_encode([
			"status" => '400',
			"error" => "Invalid credentials"
		]
		);
	}


	/*function Logout()
	{
		$_SESSION['id'] = null;

		$_SESSION['nick'] = null;

		$_SESSION['status'] = null;

		$_SESSION['password'] = null;

		$_SESSION['suspended'] = null;

		$_SESSION['lastLogged'] = null;

		header('Location: /index');

		return true;
	}*/
?>
