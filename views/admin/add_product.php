<?php 
include "views/header.php";
include "back.php";
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
	header('location: login.php');
}


$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>
<form action="back" method="post" enctype="multipart/form-data">
	<input type="text" name="title">
	<input type="text" name="description">
	<input type="text" name="price">
	<input type="file" name="file">
	<select name="category">
		<?php while($row = $result->fetch()){ ?>
		<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
		<?php } ?>
	</select>
	<input type="hidden" name="event" value="product">
	<button>Send</button>
</form>

<?php
echo '<table>';

	$query = $conn->query('SELECT * FROM products');
	while ($row = $query->fetch(PDO::FETCH_OBJ)) {
		echo '<tr>';
		echo '<th>';
		echo '<td>'.$row->title.'</td>';
		echo '<td>'.$row->description.'</td>';
		echo '<td>' .$row->price.'</td>';
		echo '<td><img src="'.$url.$row->img.'"></td>';
		echo '<td><a href="back.php?event=delete&id='.$row->id.'"><button>Delete</button></a></td>';
		echo '<td><a href="back.php?event=edit&id='.$row->id.'"><button>Edit</button></a></td>';

		echo '</th>';
		echo '</tr>';
	}
echo '</table>';
?>
<?php
	include "views/footer.php";
?>