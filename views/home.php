<?php
	include "header.php";
	include "admin/back.php";
	require_once "admin/connect.php";
	require_once "admin/functions.php";
	
?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Wrapper for slides -->
			<div class="carousel-inner">
						<?php 
						$i=0;
							$carousel = select('carousel', $conn, false);
							foreach($carousel as $key){
						$i++;
						if($i==1){?>
						    <div class="item active">
									<img src="<?=$url.$key['img']?>" alt="Los Angeles">
						    </div>
						<?php }else{ ?>
				   				 <div class="item">
										<img src="<?=$url.$key['img']?>" alt="Los Angeles">
				   				 </div>
						<?php } 
					}?>
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>

	</div>


<!-- category -->

<div class="page2">
	<?php 
		$categories = select('categories', $conn, false, 'ORDER BY id ASC LIMIT 3');
		foreach($categories as $key){
	?>
	<div>
		<a href="back.php?event=page&id=<?= $key['id'] ?>">
			<h1><?= $key['name'] ?></h1>
			<img src="<?= $url.$key['img'] ?>">
		</a>
	</div>
	<?php } ?>
</div>

<div class="page4">
	<a href="categories">
		<h1>ՕԾԱՆԵԼԻՔ</h1>
		<div>
			<img src="<?= $url ?>img/cosmetics-11-1024x478.jpg">
		</div>
	</a>
</div>

<div class="page5">
	<h1>Gallery</h1>
	<div>
		<div >
			<a href="back.php?event=product&id='.$row->id.'" >
				<?php 
							$gallery = select('gallery', $conn, false);
							foreach($gallery as $key){
						?>
							<img  class="duxi" src="<?=$url.$key['img']?>" alt="Los Angeles">
						<?php } ?>
			</a>
		</div>
	</div>
</div>

<?php
	include "footer.php";
?>