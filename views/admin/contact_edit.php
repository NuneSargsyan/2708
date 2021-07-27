<?php include "back.php"; 

	$query = $conn->prepare('SELECT * FROM contact WHERE id = ?');
	$query->execute(array(2));
	$contact = $query->fetch();
?>

<div class="adress">
		<p>Tel. <?= $contact['tel']?></p>
		<p>Adress <?= $contact['address']?></p>
		<p>Email <?= $contact['email']?></p>
	</div>

<form action="back.php" method="post" >
	<input type="hidden" name="event" value="edit_contact">
	<input type="text" value="<?= $contact['tel']?>" name="tel">
	<input type="text"  value="<?= $contact['address']?>" name="address">
	<input type="text"  value="<?= $contact['email']?>" name="email">
	
	<input type="hidden" name="event" value="edit_contact">
	<button>Edit</button>
</form>



