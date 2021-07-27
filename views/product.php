
<?php
	include "header.php";
	
?>
<div class="product-page">
	<div class="product-img">
		<img src="<?= $url ?><?= $product['img']?>">
	</div>
	<div class="product-text">
		<h1><?= $product['title']?></h1>
		<h1><?= $product['price']?></h1>
		<h1><?= $product['description']?></h1>
		<!-- <h1>ProductD</h1> -->


		<form action="back.php"  method="post">
			<input type="hidden" name="event" value="add_cart">
			<input type="text" name="count" placeholder="Count">
			<input type="hidden" name="id" value="<?= $product['id'] ?>">
			<button>Add</button>
		</form>
	</div>
</div>
<?php
	include "views/footer.php";
?>