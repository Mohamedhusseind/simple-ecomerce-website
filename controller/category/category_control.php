<?php
require_once '../class/category.php';
require_once '../user/auth.php';
$cat_name = $_POST['cat_name'];
$username = $_POST['username'];
echo $username."here<br>";
$user = new Auth();
$category = new Category();

/****************Add category****************/
if(isset($cat_name,$username))
{
    $uid = $user->user_id($username);
    echo "insert  -".$uid."<br>";
    if($category->category_exist($cat_name)!=$cat_name)
    {
        if ($category->insert_category($uid,$cat_name))
        {
            header('Location:../../view/home.php?success=inert category success');
        }
    }
    else{header('Location:../../view/home.php?fail=This Category Already Exist');}
}
else{header('Location:../view/home.php');}
/*****************Delete Category ***************/

if(isset($_GET['delete']))
{
    if($category->delete_category($_GET['delete']))
    header('Location:../../view/home.php?success=Delete category success');
}

/*****************Update Category*******************************/
$updated_cat = $_POST['edit_name'];
$edited_id = $_POST['edited_id'];
if(isset($updated_cat,$edited_id))
{
    if($category->category_exist($updated_cat))
    {
        header('Location:../../view/home.php?fail=This Category Already Exist');
    }
    else
    {
        $category->update_category($_POST['edit_name'], $_POST['edited_id']);
        header('Location:../../view/home.php?success=Delete category success');
    }
}