<?php
include 'app.php';
?>
<div class="container">
    <!--------Login Form------->
    <div class="row justify-content-center " id="login">
        <div class="col-lg-10  my-auto">
            <div class="card-group  justify-content-center">
                <div class="card bg-light  col-6  p-4" style="flex-grow: 1.4;">
                    <h1 class="text-center font-weight-bold text-primary">Forget Password</h1>
                    <hr class="my-3">
                    <p class="text-center font-weight-bold text-danger"><?php if (isset($_GET['fail'])){echo $_GET['fail'];} ?></p>
                    <p class="text-center font-weight-bold text-success"><?php if (isset($_GET['success'])){echo $_GET['success'];} ?></p>

                    <form action="../controller/user/restpassword.php" method="post" class="px-3" id="login-form" enctype="multipart/form-data">
                        <div class="row justify-content-center px-3 input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" placeholder="Enter Email" name="email" id="username"  class=" col-10  form-control border-info placeicon rounded-0" >
                        </div>

                        <div class="form-group">
                            <div id="userError" class="text-danger font-weight-bold"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="login-btn" value="Reset" class="btn btn-primary btn-lg btn-block myBtn" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        