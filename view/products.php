<?php
include 'app.php';
require_once '../controller/class/product.php';
?>

<div class="container pb-5 mb-sm-1">
    <!-- Categories grid-->
    <div class="row">
        <div class="col-lg-12  my-auto">
            <div class=" bg-light  col-12  p-4" style="flex-grow: 1.4;">
                <h1 class="text-center font-weight-bold text-primary">Products Page</h1>
                <p class="text-center font-weight-bold text-success"><?php if (isset($_GET['success'])){echo $_GET['success'];} ?></p>
                <p class="text-center font-weight-bold text-danger"><?php if (isset($_GET['fail'])){echo $_GET['fail'];} ?></p>

                <hr class="my-3">
                <p>
                    <?php if(isset($_GET['check'])) {echo $_GET['check'];} ?>
                </p>
                <div class="card-header bg-primary d-flex justify-content-between">
                    <a href="home.php" class="float-left text-light btn btn-lg">Categories</a>
                    <span class="text-light m-4 ">All Products</span>
                    <?php if (isset($_SESSION['user'])){ echo'
                    <a class="btn btn-light btn-lg float-right" data-toggle="modal" data-target="#myModal">
                        <i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add New Product
                    </a>
                    ';}?>
                </div>
            </div>
        </div>
    </div>
        <!-- Categories-->
            <?php
                $products = new Product();
                echo $products->all_products($_GET['id']);
            ?>

</div>

<!-- Modal For Insert Product-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="../controller/product/product_control.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Name:</label>
                        <input type="text" name="pro_name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product image:</label>
                        <input type="file" name="image" class="" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="cid" value="<?php if (isset($_GET['id'])){echo $_GET['id'];}?>" id="recipient-name">
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!----END MODEL--->

<!-- Modal For Update -->
<div class="modal fade" id="update" role="dialog" tabindex="-1" aria-labelledby="bannerformmodal">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="../controller/product/product_control.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Name:</label>
                        <input type="text" name="edit_name" class="form-control" id="edit_name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product image:</label>
                        <input type="file" name="edit_image" class="" id="edit_image">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="cid" value="<?php if (isset($_GET['id'])){echo $_GET['id'];}?>" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="pid"  id="pid">
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!----END MODEL--->

<!-- Modal -->
<div class="modal fade" id="model_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-success text-center" >Product Details</p>
                <p class="text-success text-center" >Here</p>
                <p class="text-success text-center" >Description</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
function take_id(id) {
document.getElementById('pid').value=id;
    document.getElementById("edit_name").value =document.getElementById('product_name').getAttribute('title');
    document.getElementById("pname").value =document.getElementById('prod_name').value;
}
function take_image(image="default.png") {
    document.getElementById('image_mod').src = "../images/"+image;
}
</script>
</body>
</html>
