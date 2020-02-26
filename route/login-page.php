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
        <div class="form-group row">
            <label for="login-username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="login-username" placeholder="Username">
            </div>
        </div>
        <div class="form-group row">
            <label for="login-password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="login-password" placeholder="Password">
            </div>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Sign In</button>
    </form>
</section>
<!--End of Login Section -->
<!--Footer Section-->