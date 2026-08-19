<?php
include 'config/dbconnector.php';

// 주소 분류(explode)
$path = explode("?", $_SERVER['REQUEST_URI']);
$resource = explode("/", $path[0]);
$param1 = isset($resource[1]) ? $resource[1] : NULL;
$param2 = isset($resource[2]) ? $resource[2] : NULL;
$param3 = isset($resource[3]) ? $resource[3] : NULL;

// 주소별 불러올 페이지 지정(switch/case)
$currentPage = '';
switch($path[0]){
    case '/':
        $currentPage = 'Home';
        break;
    case '/products':
        $currentPage = 'ProductList';
        break;

    case "/products/${param2}":
        $currentPage = 'ProductDetail';
        break;

    // ===== API(= 추가주문, 비동기 처리) ===== //
    case '/api/products':
        $currentPage = 'ProductListController';
        break;
    case '/api/albums':
        $currentPage = 'albumListController';
        break;

    default:
        $currentPage = 'Home';
        break;
}

// 페이지 불러오기(include)
if($param1 == 'api'){
    include "api/{$currentPage}.php";
}else{
    include "layout.php";
}
?>