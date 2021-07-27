
<form action="back" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $results['id'] ?>">
	<input type="text" value="<?= $results['title'] ?>" name="title">
	<input type="text"  value="<?= $results['description'] ?>" name="description">
	<input type="text"  value="<?= $results['price'] ?>" name="price">
	<select name="category">
		<?php while($row = $categories->fetch()){ ?>
		<?php if($results['category_id']==$row['id']){ ?>
			<option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
		<?php }else{ ?>
			<option  value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
		<?php }
		}
		 ?>
	</select>
	<input type="hidden" name="event" value="edit_product">
	<button>Send</button>
</form>

