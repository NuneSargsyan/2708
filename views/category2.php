<?php
	include "header.php";
	include "admin/back.php";
?>


<div class="categories">
		
			<div class="right">
					<?php


	$query = $conn->query('SELECT * FROM categories');
	$query->execute();
	while ($row = $query->fetch(PDO::FETCH_OBJ)) {
		echo '<div>';
		echo '<a href ="back.php?event=page&id='.$row->id.'""';
		echo '<h2>'.$row->name.'</h2>';
		echo '<div><img src="'.$url.$row->img.'"></div>';
		echo '</a>';
		echo '</div>';
	}

?>
				
			
		</div>
	</div>

	<?php
	include "footer.php";
?>