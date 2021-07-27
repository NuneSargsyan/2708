<?php 

function redirect($page){
	return header("location: $page");
}

function upload($file){
	$folder = 'public/img/';
	$folderForDb='img/';
	$uploadfile = $folder . basename($file['file']['name']); //img/nkar.jpg
	$folderForDb = $folderForDb . basename($file['file']['name']); //img/nkar.jpg
	move_uploaded_file($file['file']['tmp_name'], $uploadfile);
	return $folderForDb;
}
// "ORDER BY id DESC LIMIT 4"
function select($table, $conn, $where=false, $order=false){
	if($where!=false){
		$stmt = $conn->prepare("SELECT * FROM $table WHERE $where");
	}else if($order!=false && $where==false){
		$stmt = $conn->prepare("SELECT * FROM $table $order");
	}else if($order!=false && $where!=false){
		$stmt = $conn->prepare("SELECT * FROM $table WHERE $where $order");
	}else{
		$stmt = $conn->prepare("SELECT * FROM $table");
	}

	$stmt->execute(); 
	$data = $stmt->fetchAll();
	return $data;
}


function delete($table, $conn,$where=false){
	if($where!=false){
		$stmt = $conn->prepare("SELECT * FROM $table WHERE $where");
	}else{
		$stmt = $conn->prepare("SELECT * FROM $table");
	}

	$stmt->execute(); 
	$data = $stmt->fetch();
	return $data;
}
// $data = select('products', $conn);
// $data1 = select('users', $conn);
// var_dump($data);
// var_dump($data1);
/*$data2 = delete('products',$conn,11);
var_dump($data2);*/