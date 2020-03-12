<?php
    $error="";
    if(isset($_POST['login'])){
        require_once('data/database.php');
        if(connectDB()){
            $username = htmlspecialchars(strip_tags($_POST['username']));
            $password = htmlspecialchars(strip_tags($_POST['password']));
            if(loginUser($username,MD5($password))){
                $_SESSION['log'] = true;
                $error="";
                echo "<script type='text/javascript'> window.location='index.php'; </script>";
            }else{
                $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>Incorrect login details</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
            }
            closeDB();
        }

    }
?>
<!--Navigation Bar -->
<header class="header-section">
    <?php
        include('template/navbar.php');
    ?>
</header>
<!--End of Navigation Bar-->
<!--Login Section -->
<section class="container text-center" style="min-height: 95vh;">
    <div class="col-6 mx-auto mt-5">
        <div class="card">
            <div class="card-body">
                <form class="login-form" method="post">
                    <div class="form-group row">
                        <div class="col-sm-12">
                        &nbsp
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="username" class="form-control" maxlength="30" id="login-username" placeholder="Username" value="<?php echo isset($_POST['username'])? $_POST['username']: '';?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control" maxlength="20" id="login-password" placeholder="Password"  required>
                        </div>
                    </div>
                    <?php echo $error; ?>
                    <button type="submit" name="login" class="btn btn-light">Sign In</button>  
                </form>
            </div>
            <div class="card-footer">
                <p class="card-text">Don't have an account yet?</p>
                <a href="register.php">Register Now!</a>
            </div>
        </div>
    </div>
</section>
<!--End of Login Section -->
<!--Footer Section-->
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
