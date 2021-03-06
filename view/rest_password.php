<?php
include 'app.php';
?>
<div class="container">
    <!--------Login Form------->
    <div class="row justify-content-center " id="login">
        <div class="col-lg-10  my-auto">
            <div class="card-group  justify-content-center">
                <div class="card bg-light  col-6  p-4" style="flex-grow: 1.4;">
                    <h1 class="text-center font-weight-bold text-primary">Rest Password</h1>
                    <hr class="my-3">
                    <form action="../controller/user/update_password.php" onsubmit="return match()" enctype="multipart/form-data" method="post" class="px-3" id="login-form">
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                 <span class="input-group-text rounded-0">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password" placeholder="password" name="password" id="password"   class="form-control rounded-0" >
                            <input type="hidden"  name="email" id="email" value="<?php $_GET['email'] ?>"   class="form-control rounded-0" >
                        </div>

                        <div class="form-group">
                            <div id="pass" class="text-danger font-weight-bold"></div>
                        </div>

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password" name="conf_password" placeholder="Confirm Password" id="conf_password"  class="form-control rounded-0" >
                        </div>

                        <div class="form-group">
                            <div id="passError" class="text-danger font-weight-bold"></div>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="login-btn" value="Verify" class="btn btn-primary btn-lg btn-block myBtn" />
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
        var pass  = document.getElementById("pass");
        if (password == ""){pass.textContent="Pasword must fill out!"; return false;}
        else{pass.textContent="";}
        if (password != conf_password)
        {
            passerror.textContent="Pasword did not match";
            return false;
        }
        else {
            return true;}
    }
</script>
</body>
</html>

           