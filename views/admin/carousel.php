<?php
	include "views/header.php";
	include "back.php";
?>

	<form action="back.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="hidden" name="event" value="gallery">
		<button>Send</button>
	</form>
<?php
	include "views/footer.php";
?>