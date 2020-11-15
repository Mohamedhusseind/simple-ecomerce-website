<?php
include 'app.php';
require_once '../controller/class/category.php';
?>
<div class="container pb-5 mb-sm-1">
    <!-- Categories grid-->
    <div class="row">
        <div class="col-lg-12  my-auto">
            <h1 class="text-center font-weight-bold text-primary">Welcome page</h1>
            <p class="text-center font-weight-bold text-success"><?php if (isset($_GET['success'])){echo $_GET['success'];} ?></p>
            <p class="text-center font-weight-bold text-danger"><?php if (isset($_GET['fail'])){echo $_GET['fail'];} ?></p>

            <div class=" bg-light  col-12  p-4" style="flex-grow: 1.4;">

                <hr class="my-3">
                <p class="text-success text-center card">
                    <?php if(isset($_GET['check'])) {echo $_GET['check'];} ?>
                </p>
                <div class="card-header bg-primary d-flex justify-content-between">
                    <a href="home.php" class="float-left text-light btn btn-lg">Categories</a>
                    <span class="text-light m-4 ">All Categories</span>
                    <?php if (isset($_SESSION['user'])){ echo'
                    <a class="btn btn-light btn-lg" data-toggle="modal" data-target="#myModal">
                        <i class="fas fa-plus-circle fa-lg"></i>&nbsp; Add New Category
                    </a>
                    ';}?>
                </h5>
            </div>
            <div class="list-group bg-light  col-12  p-4" style="flex-grow: 1.4;"">
            <?php

                $categories = new Category();
                $data = $categories->all_categories();

            ?>
            </div>

        </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form method="POST" action="../controller/category/category_control.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">Category Name:</label>
                        <input type="text" name="cat_name" class="form-control" id="recipient-name">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['user']?>" class="form-control" id="username">
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

<!-- Update Modal -->
<div class="modal fade" id="update" role="dialog" tabindex="-1" aria-labelledby="bannerformmodal" >
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form method="POST" action="../controller/category/category_control.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label">New Category Name:</label>
                        <input type="text"  name="edit_name"  class="form-control" id="edit_name">
                    </div>
                    <div class="form-group">
                        <input type="hidden"  name="edited_id"  class="form-control" id="edited_id">
                    </div>
                    <button type="submit" class="btn btn-primary">EDIT</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!----END MODEL--->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
function take_id(cat_name) {
document.getElementById('edited_id').value=cat_name;
}
</script>
</body>
</html>
