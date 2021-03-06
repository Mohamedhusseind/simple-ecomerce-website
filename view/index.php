<?php
include 'app.php';
if(isset($_SESSION['user']))
{
    header('Location:../home.php');
}
?>
<div class="container">
    <!--------Login Form------->
    <div class="row justify-content-center " id="login">
        <div class="col-lg-10  my-auto">
            <div class="card-group  justify-content-center">
                <div class="card bg-light  col-6  p-4" style="flex-grow: 1.4;">
                    <h1 class="text-center font-weight-bold text-primary">Login</h1>
                    <hr class="my-3">
                    <div class=" text-success text-center"><?php if (isset($_GET['confirm'])){echo $_GET['confirm'];} ?></div>
                    <div class="alert alert-dismissible text-danger text-center"><?php if (isset($_GET['fail'])){echo $_GET['fail'];}?></div>
                    <form action="../controller/user/login.php" onsubmit="return check();" method="post" class="px-3" id="login-form" enctype="multipart/form-data">
                        <div class="row justify-content-center px-3 input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-user fa-lg"></i>
                                </span>
                            </div>
                            <input type="text" placeholder="UserName" name="username" id="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username']; } ?>" class=" col-10  form-control border-info placeicon rounded-0" >
                        </div>


                        <div class="form-group">
                            <div id="userError" class="text-danger font-weight-bold"></div>
                        </div>

                        <div class="row justify-content-center px-3 input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg "></i>
                                </span>
                            </div>
                            <input type="password" name="password" placeholder="Password" id="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password']; } ?>" class=" col-10  form-control border-info placeicon rounded-0" >
                        </div>

                        <div class="form-group">
                            <div id="passError" class="text-danger font-weight-bold"></div>
                        </div>

                        <div class="form-group clearfix">
                            <div class="custom-control custom-checkbox float-left">
                                <input type="checkbox" class="custom-control-input"  id="customCheck" name="rem" />
                                <label class="custom-control-label" for="customCheck">Remember me</label>
                            </div>

                            <div class="forgot float-right">
                                <a href="forgetpassword.php" id="forgot-link">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="login-btn" value="Sign In" class="btn btn-primary btn-lg btn-block myBtn" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script>
    function check() {

        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var userError = document.getElementById('userError');
        var passError = document.getElementById('passError');
        if (username == "")
        {
            userError.textContent="UserName must be filled out";
            return false;
        }
        else {userError.textContent="";}
        if (password == "")
        {
            passError.textContent="Password must be filled out";
            return false;
        }else return true;
    }
</script>
</body>
</html>
              