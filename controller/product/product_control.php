<?php
session_start();
require_once '../class/product.php';
require_once '../user/auth.php';
$pro_name = $_POST['pro_name'];
$cid = $_POST['cid'];
$image = $_FILES['image']['name'];
$username = $_SESSION['user'];


$user = new Auth();
$category = new Product();
$product = new Product();
$uid=$user->user_id($username);

/********************Insert product ******************/
if(isset($uid,$cid,$pro_name,$image))
{
    if($product->insert_product($uid,$cid,$pro_name,$image))
    {
        move_uploaded_file($_FILES['image']['tmp_name'],"../../images/$image");
        header('Location:../../view/products.php?id='.$cid.'&success=Product Inserted Successfully');
    }
    else
        echo header('Location:../../view/products.php?id='.$cid.'&fail=Happen Problem!Product Not Inserted');
}
else{echo "waf";}
if(isset($_GET['delete']))
{
    if($product->delete_product($_GET['delete'])){header('Location:../../view/products.php?id='.$_GET['cid'].'&success=Product Deleted Successfully');}
}

/********************update product ******************/

$updated_name = $_POST['edit_name'];
$updated_image = $_FILES['edit_image']['name'];
$pid= $_POST['pid'];
if(isset($updated_name,$updated_image,$pid))
{
    move_uploaded_file($_FILES['edit_image']['tmp_name'],"../images/$image");
    if($product->update_product($pid,$updated_name,$updated_image))
    {
        header('Location:../../view/products.php?id='.$cid.'&success=Product updated Successfully');
    }
    else header('Location:../../view/products.php?id='.$cid.'&fail=Happen Problem!Product Not Update');

}

