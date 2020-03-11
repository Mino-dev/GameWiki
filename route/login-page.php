<?php
    $error="";
    if(isset($_POST['login'])){
        require_once('data/database.php');
        if(connectDB()){
            $username = strip_tags($_POST['username']);
            $password = MD5(strip_tags($_POST['password']));
            if(loginUser($username,$password)){
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
<div class="col-6 align-center mx-auto">
	<section class="section-main container text-center">
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
			<button type="submit" name="login" class="btn btn-primary">Sign In</button>

		</form>

		<h3>Don't have an account yet?</h3>
		<a href="register.php">Register Now!</a>
	</section>
</div>
<!--End of Login Section -->
<!--Footer Section-->
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
