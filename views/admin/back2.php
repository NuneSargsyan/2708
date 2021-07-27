<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "shop";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


session_start();
if(isset($_POST['event']) && $_POST['event'] == "registration"){

	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$new_password = password_hash($password,PASSWORD_DEFAULT);


	$sql = "INSERT INTO users (name, surname, email, password) VALUES (?,?,?,?)";
	$stmt= $conn->prepare($sql);


	if ($stmt->execute([$name, $surname, $email, $new_password])) {
		  header("location: login.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_POST['event']) && $_POST['event']=="login"){
	$email = $_POST["email"];
	$password = $_POST["password"];
	$error = "";
	// $sql = "SELECT * FROM users WHERE email='$email'";


$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]); 
	$data = $stmt->fetch();
	if (count($data) > 0) {
		if(password_verify($password,$data["password"])){
		$_SESSION["id"] = $data["id"];
		header("location: add_product.php");
		}else{
			$error .= "Password error";
			$_SESSION["error"] = $error;

		  header("location: login.php");

		}
	} else {
	  $error .="Email error";
	  $_SESSION["error"] = $error;
	  header("location: login.php");
	}
}

if(isset($_POST['event']) && $_POST['event']=="product"){
	$title = $_POST["title"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$category = $_POST["category"];

	$folder = 'img/';
	$uploadfile = $folder . basename($_FILES['file']['name']); //img/nkar.jpg

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
	$sql = "INSERT INTO products (title,description, price,category_id, img)
	VALUES ('$title', '$description', '$price',$category, '$uploadfile')";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


}