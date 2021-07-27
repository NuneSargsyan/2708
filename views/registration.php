<?php
	include "header.php";
?>

<form action="back.php" method="post">
	<input type="text" name="name" placeholder="Name">
	<input type="text" name="surname" placeholder="Surname">
	<input type="text" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<input type="hidden" name="event" value="registration">
	<button>Send</button>
</form>

<?php
	include "footer.php";
?>