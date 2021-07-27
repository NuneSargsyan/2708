

<?php
	include "header.php";
?>
<div class="products">
	<?php
	foreach($products as $row) {
		echo '<div>';
		echo '<a href ="back.php?event=product&id='.$row['id'].'""';
			echo '<h2>'.$row['title'].'</h2>';
			echo '<p>'.$row['description'].'</p>';
			echo '<span>'.$row['price'].'</span>';
			echo '<div><img src="'.$url.$row['img'].'"></div>';
		echo '</a>';
		echo '</div>';
	}

	?>
</div>
<?php
	include "views/footer.php";
?>
