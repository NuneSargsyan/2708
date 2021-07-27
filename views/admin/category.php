<?php
	include "views/header.php";
	include "back.php";
	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
?>

	

	
	<form action="back.php" method="post" enctype="multipart/form-data">
		<input type="text" name="name">
		<input type="file" name="file">
		<input type="hidden" name="event" value="category">
		<button>Send</button>
	</form>

	

	

</body>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="script.js"></script>
</html>
<?php
	include "views/footer.php";
?>