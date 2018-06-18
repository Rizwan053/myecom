<?php 
require_once('includes/front_header.php');
if(isset($_GET['action'])){
    $product_id = $_GET['id'];
    $action = $_GET['action'];
}else{
    header('location:/');
}


if($action == 'empty'){
    unset($_SESSION['cart']);
}
else{
$product = Product::find_by_id($product_id);

if($obj = $product->fetch_object()):

switch ($action) {
    case 'add':
       if($_SESSION['cart'][$product_id]+1 <= $obj->quantity){
        $_SESSION['cart'][$product_id]++;
       }
        break;

    case "remove":
        $_SESSION['cart'][$product_id]--;
        if ($_SESSION['cart'][$product_id] == 0)
            unset($_SESSION['cart'][$product_id]);
        break;
}

endif;
}
header('location:/cart.php')

?>