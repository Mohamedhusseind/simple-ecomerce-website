<?php
include 'app.php';
if(isset($_SESSION['user']))
{
    header('Location:home.php');
}
?>
<div class="container">
    <!--------Login Form------->
    <div class="row justify-content-center " id="login">
        <div class="col-lg-10  my-auto">
            <div class="card-group  justify-content-center">
                <div class="card bg-light  col-6  p-4" style="flex-grow: 1.4;">
                    <h1 class="text-center font-weight-bold text-primary">SignUp</h1>
                    <hr class="my-3">
                    <form action="../controller/user/register.php" onsubmit="return match()" enctype="multipart/form-data" method="post" class="px-3" id="login-form">

                        <div class="input-group input-group-lg form-group">
                            <input type="text" value="<?php if (!empty($_GET['username'])){echo $_GET['username'];}else echo "";?>"  placeholder="UserName" name="username" id="username" class="form-control rounded-0" required minlength="3">
                        </div>

                        <div class="form-group">
                            <div class="text-danger font-weight-bold">
                                <?php
                                if (!empty($_GET['value'])){echo $_GET['value'];}else{echo "";}
                                ?>
                            </div>
                        </div>

                        <div class="input-group input-group-lg form-group">
                            <input type="email" value="<?php if (!empty($_GET['email'])){echo $_GET['email'];}else echo "";?>" name="email" placeholder="Email" id="email" class="form-control rounded-0" required>
                        </div>
                        <div class="form-group">
                            <div class="text-danger font-weight-bold">
                                <?php
                                if (!empty($_GET['email_exist'])){echo $_GET['email_exist'];}else{echo "";}
                                ?>
                            </div>
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <input type="password" placeholder="Password" name="password" id="password" class="form-control rounded-0" required>
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <input type="password" placeholder="ConfirmPassword" name="conf_password" id="conf_password" class="form-control rounded-0" required>
                        </div>

                        <div class="form-group">
                            <div id="passError" class="text-danger font-weight-bold"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="login-btn" value="Register" class="btn btn-primary btn-lg btn-block myBtn" />
                        </div>

                            <div class="forgot  text-center">
                                <a href="index.php" id="forgot-link">login</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script>

    function match() {
        var password = document.getElementById("password").value;
        var conf_password = document.getElementById("conf_password").value;
        var passerror = document.getElementById("passError");
        if (password != conf_password)
        {
            passerror.textContent="Paaword did not match";
            return false;
        }
        if (password != conf_password)
        {
            passerror.textContent="Paaword did not match";
            return false;
        }
    }
</script>
</body>
</html>
        