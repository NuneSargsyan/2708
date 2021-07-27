<?php
	include "header.php";
	require_once "admin/functions.php";
?>
<?php
$err = '';
if(isset($_SESSION["error"])){
$err = $_SESSION["error"];
}

?>
<form action="back.php" method="post">
	<input type="text" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<input type="hidden" name="event" value="login">
	<button>Send</button>
	<p><?=  $err ?></p>
</form>

<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
	redirect('admin');
}else{
		session_unset();
}
	include "footer.php";
?>