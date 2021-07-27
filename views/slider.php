<?php
	include "header.php";
	include "admin/back.php";
	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
?>

	<div class="page3">
			
			<h1>Now products</h1>
			
		 <section class="regular slider">
		 	<?php while($row = $result->fetch()){ ?>
		    <div>
		      <img src="<?= $url ?><?= $row['img'] ?>">
		    </div>
		 	<?php } ?>
		    
		</section>
	</div>

<?php
	include "footer.php";
?>