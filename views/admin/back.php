<?php

require_once "connect.php";
require_once "functions.php";

$event = '';
if(isset($_GET['event'])){
	$event=$_GET['event'];
}

if(isset($_POST['event']) && $_POST['event'] == "registration"){

	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$new_password = password_hash($password,PASSWORD_DEFAULT);

	$sql = "INSERT INTO users (name, surname, email, password,role_id) VALUES (?,?,?,?,?)";
	$stmt= $conn->prepare($sql);

	if ($stmt->execute([$name, $surname, $email, $new_password,1])) {
		  header("location: login");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_POST['event']) && $_POST['event']=="login"){
	$email = $_POST["email"];
	$password = $_POST["password"];
	$error = "";
	$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
	$stmt->execute([$email]); 
	$data = $stmt->fetch();
	if (count($data) > 0) {
		if(password_verify($password,$data["password"])){
		$_SESSION["id"] = $data["id"];
		$_SESSION["role"] = $data["role_id"];
		 redirect('admin');
		/*header("location: add_product");*/
		}else{
			$error .= "Password error";
			$_SESSION["error"] = $error;
		 /* header("location: login");*/
			redirect('login');

		}
	} else {
	  $error .="Email error";
	  $_SESSION["error"] = $error;
		  redirect('login');
	 /* header("location: login");*/
	}
}

if(isset($_POST['event']) && $_POST['event']=="category"){
	$name = $_POST["name"];

	$uploadfile=upload($_FILES);
	$sql = "INSERT INTO categories (name,img) VALUES (?,?)";
	$stmt= $conn->prepare($sql);
if ($uploadfile) {

	if ($stmt->execute([$name,$uploadfile])) {
		 redirect('category');
		   /*header("location:add_product");*/
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
	
}

if(isset($_POST['event']) && $_POST['event']=="product"){
	$title = $_POST["title"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$category = $_POST["category"];

	$folder = 'public/img/';
	$folderForDb='img/';
	$uploadfile = $folder . basename($_FILES['file']['name']); //img/nkar.jpg
	$folderForDb = $folderForDb . basename($_FILES['file']['name']); //img/nkar.jpg

	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		$sql = "INSERT INTO products (title,description, price, category_id, img) VALUES (?,?,?,?,?)";
		$stmt= $conn->prepare($sql);

		if ($stmt->execute([$title, $description, $price, $category, $folderForDb])) {
			  redirect('add_product');
			/*  header("location: add_product");*/
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

// add_cart and delete cart
if(isset($_POST['event']) && $_POST['event']=="add_cart"){
	// setcookie("shopping_cart", 1, time()+3600);
	// redirect('cart');
		 if(isset($_COOKIE["shopping_cart"])) {
		  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

		  $cart_data = json_decode($cookie_data, true); // sarquma zangvac
		 }else{
		  $cart_data = array();
		 }

		 $item_id_list = array_column($cart_data, 'item_id');
		 if(in_array($_POST["id"], $item_id_list)){ //nor avelacvox apranqic mer zangvacum ka
		  foreach($cart_data as $keys => $values){
		   if($cart_data[$keys]["item_id"] == $_POST["id"]){
		    $cart_data[$keys]["count"] = $cart_data[$keys]["count"] + $_POST["count"];//exac qanakin gumari nor ekac qanake
		   }
		  }
		 }else{
			  $item_array = array(
			   'item_id'   => $_POST["id"],
			   'count'  => $_POST["count"]
			  );
			  $cart_data[] = $item_array;
 		  }

 
 		 $item_data = json_encode($cart_data);
 		 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
		 redirect('cart');

}

if(isset($event) && $event=="delete_cart"){
 $id = $_GET['id'];
 $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true); //stringic hanuma zangvac, voch miayn
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $id)
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data); //sarquma string
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
	redirect('cart');

   }
  }
}

// add_cart and delete cart

if(isset($_POST['event']) && $_POST['event']=="gallery"){

	$folder = 'public/img/';
	$folderForDb='img/';
	$uploadfile = $folder . basename($_FILES['file']['name']); //img/nkar.jpg
	$folderForDb = $folderForDb . basename($_FILES['file']['name']); //img/nkar.jpg

	$sql = "INSERT INTO gallery (img) VALUES (?)";
	$stmt= $conn->prepare($sql);

	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {

			if ($stmt->execute([$folderForDb])) {
				 redirect('gallery');
				   /*header("location:add_product");*/
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
	}
	
}




if(isset($_POST['event']) && $_POST['event']=="search"){
	$search = $_POST['search'];
	$query = $conn->prepare('SELECT * FROM products WHERE description LIKE ? OR title like ?');
	$query->execute(array("%$search%","%$search%"));

	while ($results = $query->fetch())
	{
	    echo $results['description'].'<br>';
	}
}
// gets
if(isset($event) && $event=='logout'){
		session_unset();
		redirect('login');

}
if(isset($event) && $event=='products'){
	$id = $_GET['id'];
	$query = $conn->prepare('SELECT * FROM products WHERE category_id = ?');
	$query->execute(array($id));
	$products = $query->fetchAll();
	require_once "views/categories.php";

}
if(isset($event) && $event=='gallery'){
	$id = $_GET['id'];
	$query = $conn->prepare('SELECT * FROM gallery WHERE id = ?');
	$query->execute(array($id));
	$gallery = $query->fetchAll();
	require_once "views/home.php";

}
if(isset($event) && $event=='page'){
	$id = $_GET['id'];
	$query = $conn->prepare('SELECT * FROM products WHERE category_id = ?');
	$query->execute(array($id));
	$products = $query->fetchAll();
	require_once "views/page.php";

}
if(isset($event) && $event=='product'){
	$id = $_GET['id'];
	$query = $conn->prepare('SELECT * FROM products WHERE id = ?');
	$query->execute(array($id));
	$product = $query->fetch();
	require_once "views/product.php";

}
if(isset($event) && $event=='contact'){
	$id = $_GET['id'];
	$query = $conn->prepare('SELECT * FROM contact WHERE id = ?');
	$query->execute(array($id));
	$product = $query->fetch();
	require_once "views/contact.php";

}
if(isset($event) && $event=='carousel'){
	$id = $_GET['id'];
	$query = $conn->prepare('SELECT * FROM carousel WHERE id = ?');
	$query->execute(array($id));
	$carousel = $query->fetchAll();
	require_once "views/home.php";

}

if(isset($event) && $event=="edit"){
	$id = $_GET['id'];

	$query = $conn->prepare('SELECT * FROM products WHERE id = ?');
	$query->execute(array($id));

	$categories = $conn->prepare('SELECT * FROM categories');
	$categories->execute();

	$results = $query->fetch();
	/*header('location: add_product');*/
	require_once "product_edit.php";
}

if(isset($_POST['event']) && $_POST['event']=='edit_product'){
	$title = $_POST["title"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$category = $_POST["category"];
	$id = $_POST["id"];

	$sql = "UPDATE products SET title=?, description=?, price=?, category_id=? WHERE id=?";
	$stmt= $conn->prepare($sql);
	$stmt->execute([$title, $description, $price, $category, $id]);
	redirect('add_product');
	/* header('location: add_product');*/

}
if(isset($_POST['event']) && $_POST['event']=='edit_contact'){
	$tel = $_POST["tel"];
	$address = $_POST["address"];
	$email = $_POST["email"];

	$sql = "UPDATE contact SET tel=?, address=?, email=?";
	$stmt= $conn->prepare($sql);
	$stmt->execute([$tel, $address, $email]);
	redirect('contact');
	/* header('location: add_product');*/

}


if(isset($event) && $event=="delete"){
	$id = $_GET['id'];
	$sql = 'DELETE FROM products WHERE id=?';
	$query = $conn->prepare($sql);
	$query->execute([$id]);
	redirect('add_product');
	/*header('location: add_product');*/

}

