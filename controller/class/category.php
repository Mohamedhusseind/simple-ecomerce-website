<?php
require_once 'config.php';

class Category extends Database {
    public function insert_category($uid,$cat_name){
        $sql = "INSERT INTO categories(uid,cat_name) VALUES (:uid,:cat_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('uid'=>$uid,'cat_name'=>$cat_name));
        return $stmt;
    }

    public function category_exist($cat_name)
    {
        $sql = "SELECT cat_name From categories where cat_name = :cat_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['cat_name' => $cat_name]);
        $row = $stmt->fetch();
        if(isset($row)){return $row[0];}
        else return false;
    }
    public function all_categories()
    {
        $data = $this->conn->query("SELECT * FROM categories")->fetchAll();
        foreach ($data as $row) {
            echo '
                <div class="list-group-item list-group-item-action">
                <a class="btn" href="products.php?id='.$row['id'].'">'.$row['cat_name'].'</a>';
                if (isset($_SESSION['user'])) { echo'
                <a href="#bannerformmodal" onclick="take_id('.$row['id'].')" title="EditCategory" id='.$row['id'].' class="edit text-primary float-right" data-toggle="modal" data-target="#update" "> <i class="fas fa-edit fa-lg"></i>&nbsp;</a>
                <a href="../controller/category/category_control.php?delete='.$row['cat_name'].'"title="DeleteCategory" class="text-danger float-right deleteBtn"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;</a>
            ';}echo '</div>';

        }
    }

    public function delete_category($cat_name)
    {
        $sql = "DELETE FROM categories WHERE cat_name=:cat_name";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['cat_name' => $cat_name]);
        return$stmt;
    }
    public function update_category($cat_name,$id)
    {
        $sql = "UPDATE categories SET cat_name=:cat_name WHERE id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['cat_name' => $cat_name,'id' => $id]);
        if($stmt)return true;else return false;
    }
    public function get_category($id)
    {
        $sql = "SELECT cat_name From categories where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        if(isset($row)){return $row[0];}
        else return false;
    }

}