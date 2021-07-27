<?php

include "admin/back";
$id = $_GET['id'];
$sql = 'DELETE FROM products WHERE id=?';
$query = $conn->prepare($sql);
$query->execute([$id]);

header('location: add_product.php');
?>