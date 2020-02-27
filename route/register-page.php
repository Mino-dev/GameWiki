<?php
    
    require_once('data/database.php');
        
    connectDB();
    if(isset($_POST['register'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        echo $email . "<br>" .$username . "<br>" . $password . "<br>" . $cpassword;
        if(!isUsernameExisting($username)){
            if(!isEmailExisting($email)){
                if($cpassword!=$password){
                    if(registerUser($username, $password, $email)){
                        echo"<script>windows.location = 'login.php';</script>";
                    }else{
                        echo "registration oops";
                    }
                }else{
                    echo "password doest not match oops";
                }
            }else{
                echo "email oops";
            }
        }else{
            echo "username oops";
        }

        
    }
?>

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
                <input type="email" name="email" class="form-control" id="register-email" placeholder="Email" required>
            </div>
            <div class="form-group col-md-6">
                <label for="register-username">Username</label>
                <input type="text" name="username" class="form-control" id="register-username" placeholder="Username" required>
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
        <button type="submit" name="register" class="btn btn-primary">Sign Up</button>
    </form>
</section>
<!--End of Login Section -->
<!--Footer Section-->