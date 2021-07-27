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
echo '<table>';

	$query = $conn->query('SELECT * FROM gallery');
	while ($row = $query->fetch()) {
		echo '<tr>';
		echo '<th>';
		echo '<td><img src="'.$url.$row['img'].'"></td>';
		echo '<td><a href="back.php?event=deleteGallery&id='.$row['id'].'"><button>Delete</button></a></td>';
		echo '<td><a href="back.php?event=editGallery&id='.$row['id'].'"><button>Edit</button></a></td>';

		echo '</th>';
		echo '</tr>';
	}
echo '</table>';
?>
<?php
	include "views/footer.php";
?>