<?php
require_once 'config.php';
class Product extends Database {

    public function insert_product($uid,$cid,$pro_name,$image){
        $sql = "INSERT INTO products(uid,cid,pro_name,image) VALUES (:uid,:cid,:pro_name,:image)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('uid'=>$uid,'cid'=>$cid,'pro_name'=>$pro_name,'image'=>$image));
        return $stmt;
    }
    public function delete_product($id)
    {
        $sql = "DELETE FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt ->execute(['id'=>$id]);
        return $stmt;
    }

    public function update_product($id,$pro_name,$image)
    {
        $sql= "UPDATE products SET pro_name=:pro_name , image=:image WHERE id =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id,'pro_name'=>$pro_name,'image'=>$image]);
        return $stmt;
    }


    public function all_products($cid)
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE cid=:cid");
        $stmt->execute(['cid'=>$cid]);
        while ($row = $stmt->fetch()) {
            $product_name = $row['pro_name'];
            $product_id = $row['id'];
            echo '
            <div class="col-md-4 ">
            <div class="card bg-light border-2 mb-grid-gutter m-2">
                <a class="card-img-tiles " href="#bannerformmoda" id="" data-toggle="modal" data-target="#model_image"></i>&nbsp;
                    <div class="thumblist"><img class="justify-content-center"  src="../images/'.$row['image'].'" alt="Sunglasses" style="width: 300px;height: 150px;"></div>
                </a>
                <div class="card-body border mt-n1 py-4 text-center">
                    <h2 class="h5 mb-1">'.$row['pro_name'].'</h2>
                </div>
                
                ';if (isset($_SESSION['user'])) { echo'
                <div class="card-body border mt-n1 py-4 text-center">
                    <input value="" type="hidden" id="">
                    <a href="#bannerformmodal" id="product_name" onclick="take_id('.$product_id.')" title="'.$product_name.'" value="'.$product_name.'"  class="text-primary editBtn"><i class="fas fa-edit fa-lg edit text-primary " data-toggle="modal" data-target="#update""></i>&nbsp;</a>
                    <a href="../controller/product/product_control.php?delete='.$row['id'].'&cid='.$row['cid'].'" title="DeleteProduct" class="text-danger deleteBtn"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;</a>
                </div>
                ';}echo '
            </div>
            </div>
           
            ';
        }
    }

}