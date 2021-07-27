<!DOCTYPE html>
<html>
<head>

	<?php 
		$exp = explode('/', $_SERVER['PHP_SELF']);
		$folderName = $exp[0].'/'.$exp[1];
		$url = 'http://'.$_SERVER['HTTP_HOST'].$folderName.'/public/';
		// session_start();
	?>
	<title>Header</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= $url ?>slick/slick-theme.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= $url ?>style.css">
</head>
<body>
	<header>
		<div>
			<div class="logo">
				<a href="home">
				<img src="<?= $url ?>img/logo.png">
				</a>
			</div>
			<div class="menu">
				<ul>
					<li><a href="home">Home</a></li>
					<li><a href="category2">Category</a></li>
					<li><a href="slider">Slider</a></li>
					<li><a href="contact">Contact</a></li>

					<?php if(isset($_SESSION['role']) && !empty($_SESSION['role']) && $_SESSION['role']==2){ ?>
						<li><a href="category">Category</a></li>
						<li><a href="add_product">add_product</a></li>
						<li><a href="contact_edit">Contact</a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="login">
				<?php if(isset($_SESSION['role']) && !empty($_SESSION['role']) && $_SESSION['role']==2){ ?>
 					<p><a href="admin">Dashboard</a></p>
						<p><a href="back.php?event=logout">Logout</a></p>

				<?php }
					/*elseif (isset($_SESSION['id'] && !empty($_SESSION['id']))) {?>
					<?php }*/

				else{ ?>
 				<p><a href="login">Login</a></p>
				<p><a href="registration">Register</a></p>
					<?php } if(isset($_SESSION['role']) && !empty($_SESSION['role']) && $_SESSION['role']!=2){ ?>
						<a href="cart"><i class="fa fa-shopping-basket"><sup> 0</sup></i></a>
					<?php } ?>

			</div>
					<div class="search">
						<form action="back.php" method="post" >
							<input type="hidden" name="event" value="search" >
							<ul>
								<li class="search1">
									<i class="fa fa-search" id="icon1"></i>
									<i class="fa fa-close" id="icon2"></i>
								</li>
									<ul class="submenu2">
										<li><input type="text" placeholder="Type here to search ..."></li>
									</ul>
							</ul>

						</form>
					</div>
					
				
			
		</div>
	</header>

<?php
	/*$arr = [
		1,
		10,
		30,
		40,
	];
	array_push($arr, 20);

	var_dump($arr);
	$user = [
		"name" => "Arman",
		"surname" => "Poxosyan",
		"Age" => 25,
	];
	 echo array_search("Arman",$user);
	 $user = array_reverse($user);
	 var_dump($user);
	/*var_dump($user);*/

	/*$arr = [1,5,10,40];
	$arr1 = [6,4,8,9];*/
	/*$arr2 = array_merge($arr,$arr1);*/
	/*$arr2 = array_replace($arr, $arr1); // poxarinum e 2-rdi tarrerov
	$sum = array_sum($arr);
	echo $sum;*/

	/*var_dump($arr2);*/
?>

