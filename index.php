<?php


        $exp = explode('/', $_SERVER['PHP_SELF']);
        $folderName = '/'.$exp[1].'/';
       


session_start();

require_once"views/admin/back.php";
$request = $_SERVER['REQUEST_URI'];


switch ($request) {
    case  $folderName  :
        require_once __DIR__ . '/views/home.php';
        break;
    case $folderName.'home' :
        require_once __DIR__ . '/views/home.php';
        break;
    case $folderName.'contact' :
        require_once __DIR__ . '/views/contact.php';
        break;
    case $folderName.'contact_edit' :
        require_once __DIR__ . '/views/admin/contact_edit.php';
        break;
    case $folderName.'cart' :
        require_once __DIR__ . '/views/cart.php';
        break;        
    // case $folderName.'product' :
    //     require_once __DIR__ . '/views/page.php';
    //     break;
    case $folderName.'add_product' :
        if($_SESSION['role']==2){
            require_once __DIR__ . '/views/admin/add_product.php';
        }else{
            require_once __DIR__ . '/views/login.php';
        }
        break;  
    case $folderName.'category' :
        require_once __DIR__ . '/views/admin/category.php';
        break;
    case $folderName.'admin' :
     if($_SESSION['role']==2){
        require_once __DIR__ . '/views/admin/admin.php';
    }else{
        // $_SESSION['id']='';
        // session_unset();
        // require_once __DIR__ . '/views/login.php';
        redirect('login');
    }
        break; 
    case $folderName.'category2' :
        require_once __DIR__ . '/views/category2.php';
        break; 
    case $folderName.'categories' :
        require_once __DIR__ . '/views/categories.php';
        break;   
    case $folderName.'page' :
        require_once __DIR__ . '/views/page.php';
        break;  
    case $folderName.'carousel' :
        require_once __DIR__ . '/views/admin/carousel.php';
        break;  
    case $folderName.'gallery' :
        require_once __DIR__ . '/views/admin/gallery.php';
        break;  
    case $folderName.'slider' :
        require_once __DIR__ . '/views/slider.php';
        break; 
    case $folderName.'back' :
        require_once __DIR__ . '/views/admin/back.php';
        break;  
    case $folderName.'login' :
        require_once __DIR__ . '/views/login.php';
        break; 
    case $folderName.'registration' :
        require_once __DIR__ . '/views/registration.php';
        break;                
    default:
        require_once __DIR__ . '/views/admin/back.php';
        break;
}
