<!--Navigation Bar -->
<header class="lr:header-section header-section">
    <?php
        include('template/navbar.html');
    ?>
</header>
<!--End of Navigation Bar-->
<!--Login Section -->
<section class="lr:main-section container">
    <form class="login-form" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="register-email">Email</label>
                <input type="email" class="form-control" id="register-email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="register-username">Username</label>
                <input type="text" class="form-control" id="register-username" placeholder="Username">
            </div>
        </div>
        <div class="form-group row">
            <label for="register-password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="register-password" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <label for="register-con-password" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="register-con-password" placeholder="Confirm Password">
            </div>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Sign In</button>
    </form>
</section>
<!--End of Login Section -->
<!--Footer Section-->