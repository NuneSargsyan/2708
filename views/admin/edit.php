<?php

include "back.php";
$id = $_GET['id'];
$sql = 'UPDATE  products SET title=:title, description=:description WHERE id=:id';
$query = $conn->prepare($sql);
$query->execute([':title'=> $title ,':description'=>$description,':id' => $id]);

header('location: add_product.php');
?>