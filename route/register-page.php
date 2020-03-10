<?php
    $error="";
    require_once('data/database.php');
    if(isset($_POST['register'])){
        if(connectDB()){
            if(empty($_POST['email']) || ctype_space($_POST['email'])||
                empty($_POST['username']) || ctype_space($_POST['username'])||
                empty($_POST['password']) || ctype_space($_POST['password'])||
                empty($_POST['cpassword']) || ctype_space($_POST['cpassword'])){                   
                $error =    "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>Fill up everything!</strong> contact the admin. 
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";    

            }else{
                $email = strip_tags($_POST['email']);
                $username = strip_tags($_POST['username']);
                $password = MD5(strip_tags($_POST['password']));
                $cpassword = MD5(strip_tags($_POST['cpassword']));
                
                if(!isUsernameExisting($username)){
                    if(!isEmailExisting($email)){
                        if($cpassword==$password){
                            require('handlers/input-validation-handler.php');
                            if(checkInputUsername(strip_tags($_POST['username']))===0){
                                if(checkInputPassword(strip_tags($_POST['cpassword']))===0 && checkInputPassword(strip_tags($_POST['password']))===0){
                                    if(registerUser($username, $password, $email)){
                                        $error="";
                                        echo "<script type='text/javascript'> window.location='login.php'; </script>";
                                    }else{
                                        $error =    "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                        <strong>Error registering user details!</strong> contact the admin. 
                                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>"; 
                                    }
                                }else{
                                    $error = checkInputPassword(strip_tags($_POST['cpassword']));
                                }
                            }else{
                                $error = checkInputUsername(strip_tags($_POST['username']));
                            }
                            
                        }else{
                            $error= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            <strong>Passwords do not match!</strong> 
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>"; 
                        }
                    }else{
                        $error =    "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                <strong>Email already existing!</strong> 
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>"; 
                                $pass = false;
                    }
                }else{
                    $error =    "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                <strong>Username already existing!</strong> 
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>";
                } 
            }
            
            
            closeDB();
            
        }
        
    } 
    
    
?>

<!--Navigation Bar -->
<header class="r:header-section header-section">
    <?php     
        include('template/navbar.php');
    ?>
</header>
<!--End of Navigation Bar-->
<!--Register Section -->
<section class="section-main container">
    <form class="login-form" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="register-email">Email</label>
                <input type="email" name="email" class="form-control" id="register-email" placeholder="Email"  value="<?php echo isset($_POST['email'])? $_POST['email']: '';?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="register-username">Username</label>
                <input type="text" name="username" class="form-control" id="register-username" placeholder="Username"  value="<?php echo isset($_POST['username'])? $_POST['username']: '';?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="register-password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="register-password" placeholder="Password" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="register-con-password" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" name="cpassword" class="form-control" id="register-con-password" placeholder="Confirm Password" required>
            </div>
        </div>
        <?php echo $error; ?>
        <button type="submit" name="register" class="btn btn-primary">Sign Up</button>
    </form>
 
	<a href="login.php">Back to Login Page</a>
</section>
<!--End of Register Section -->
<!--Footer Section-->
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
<!--End of Footer Section-->