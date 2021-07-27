<?php 
include "header.php";
include "admin/back.php";

	$query = $conn->prepare('SELECT * FROM contact WHERE id = ?');
	$query->execute(array(2));
	$contact = $query->fetch();
?>
	<div class="adress">
		<p>Tel. <?= $contact['tel']?></p>
		<p>Adress <?= $contact['address']?></p>
		<p>Email <?= $contact['email']?></p>
	</div>




<?php
	include "footer.php";
?>