<?php include 'templates/header.php'?>
<div class="container">
    <div class="card mx-auto">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form id="register_form" onsubmit="return false" autocomplete="off">
                <div class="form-group">
                    <label for="username">Full Name</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username"
                           aria-describedby="u_error">
                    <small id="u_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter email"
                           aria-describedby="e_error">
                    <small id="e_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" class="form-control" placeholder="Password"
                           aria-describedby="p_error">
                    <small id="p_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="password2">Re-enter Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Password"
                           aria-describedby="p2_error">
                    <small id="p2_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="usertype">Usertype</label>
                    <select name="usertype" id="usertype" class="form-control" aria-describedby="t_error">
                        <option value="">Choose user type</option>
                        <option value="1">Admin</option>
                        <option value="0">Other</option>
                    </select>
                    <small id="t_error" class="form-text text-muted"></small>
                </div>
                <button type="submit" name="user_register" class="btn btn-primary">
                    <span class="fa fa-user"></span>&nbsp;Register
                </button>
                <span><a href="index.php">Login</a></span>
            </form>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
</div>
<?php include 'templates/footer.php'?>
