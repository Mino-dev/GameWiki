<?php   
    if(isset($_POST['login'])){
        require_once('data/database.php'); 
        if(connectDB()){
            $username = $_POST['username'];
            $password = MD5($_POST['password']);
            if(checkLoginUser($username,$password)){
                loginUser();
                $_SESSION['id'] = "login";
                $_SESSION['log'] = true;
                echo "<script type='text/javascript'> window.location='index.php'; </script>";
            }else{
                echo "hi";
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
	<section class="section-main container">
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
		<a href="register.php">Register Now!</a>
	</section>
</div>
<!--End of Login Section -->
<!--Footer Section-->
<footer class="fixed-bottom footer-section">
    <?php include('template/footer.php'); ?>
</footer>