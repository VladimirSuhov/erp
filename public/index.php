<?php include 'templates/header.php'?>

<div class="container">
    <?php
        if (isset($_GET["msg"]) && !empty($_GET["msg"])) :?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $_GET["msg"];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>
    <div class="card mx-auto" style="width: 20rem;">
        <img src="images/generic-user-purple.png" style="width: 60%" class="card-img-top mx-auto" alt="Login icon">
        <div class="card-body">
            <h4 class="card-title text-center">Log In</h4>
            <form id="login_form" onsubmit="return false" autocomplete="off">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="log_email" id="log_email" aria-describedby="e_error"
                           placeholder="Enter email">
                    <small id="e_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="log_password" id="log_password"  aria-describedby="e_password"
                           placeholder="Password">
                    <small id="p_error" class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Login</button>
                <span><a href="#">Register</a></span>
            </form>
        </div>
        <div class="card-footer">
            <a href="#">Forgot Password ?</a>
        </div>
    </div>
</div>

<?php include_once 'templates/footer.php'?>