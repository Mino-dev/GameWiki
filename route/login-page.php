<?php
    require_once('data/database.php'); 
    if(connectDB()){
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(checkLoginUser($username,$password)){
                session_start();
                loginUser();
                $_SESSION['id'] = "login";
                $_SESSION['log'] = true;
                echo "<script type='text/javascript'> window.location='index.php'; </script>";
            }else{
                echo "hi";
            }
        }
        closeDB();
    }
    
?>
<!--Navigation Bar -->
<header class="l:header-section header-section">
    <?php
        include('template/navbar.php');
    ?>
</header>
<!--End of Navigation Bar-->
<!--Login Section -->
<section class="l:main-section container">
    <form class="login-form" method="post">
        <div class="form-group row">
            <label for="login-username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="login-username" placeholder="Username" value="<?php echo isset($_POST['username'])? $_POST['username']: '';?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="login-password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="login-password" placeholder="Password"  required>
            </div>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Sign In</button>
    </form>

    <h3>Don't have an account yet?</h3>
    <a href="register.php" type="button" class="btn btn-primary btn-sm">Register Now!</a>
</section>
<!--End of Login Section -->
<!--Footer Section-->