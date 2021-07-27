
<?php

include "header.php";
include "views/admin/back.php";

/*foreach($products as $key){
	echo $key['title'];
	echo "<br>";
}
*/
?>
<div class="products">
	<?php


	$query = $conn->query('SELECT * FROM products');
	$query->execute();
	while ($row = $query->fetch(PDO::FETCH_OBJ)) {
		echo '<div>';
		echo '<a href ="back.php?event=product&id='.$row->id.'""';
			echo '<h2>'.$row->title.'</h2>';
			echo '<p>'.$row->description.'</p>';
			echo '<span>'.$row->price.'</span>';
			echo '<div><img src="'.$url.$row->img.'"></div>';
		echo '</a>';
		echo '</div>';
	}

?>
</div>

<?php
include "views/footer.php";
?>
