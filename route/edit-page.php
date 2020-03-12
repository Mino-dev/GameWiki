<?php
    $error = "";
    require('handlers/input-validation-handler.php');
    require_once('data/database.php'); 
    if(isset($_SESSION['log'])&&$_SESSION['log']){
        $client = $_SESSION['client'];
        $email = $client['uemail'];
        $username = $client['username'];
        $path = $client['upfp'];
	}
    if(isset($_POST['edit'])){
        if(connectDB()){
            if(empty($_POST['password']) || ctype_space($_POST['password'])){
                $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>Fill out the password field.</strong> 
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
            }else{
                $password = htmlspecialchars(strip_tags($_POST['password']));
                $check = checkInputPassword($password); 
                if($check !==0 ){
                    echo "wrong password format";
                    $error = $check;
                }else{
                    $pass = true;
                    if($pass){
                        if(!checkPassword(MD5($password), $client['uid'])){
                            $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>Incorrect password</strong>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";
                            $pass = false;
                            echo "wrong password";
                        }
                    }
                    if($pass){
                        if(isset($_POST['email'])){
                            $email = htmlspecialchars(strip_tags($_POST['email']));
                            if($email != $client['uemail']){
                                if(!simpleEmailCheck($email)){
                                    $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                <strong>Invalid email format!</strong>
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>";
                                    $pass=false;
                                    echo "invalid email format";
                                }else{
                                    if(!checkIfUniqueEmail($email,$client['uid'])){
                                        $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                    <strong>Email already exists!</strong> 
                                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>"; 
                                        $pass=false;
                                        echo "Email already exists";
                                    }
                                }
                            }
                        }
                    }
                    if($pass){
                        if(isset($_POST['username'])){
                            $username = htmlspecialchars(strip_tags($_POST['username']));
                            if($username != $client['username']){ 
                                $check = checkInputUsername($username);
                                if($check !==0){
                                    $error = $check;
                                    $pass=false;
                                }else{
                                    if(!checkIfUniqueUsername($username, $client['uid'])){
                                        $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                    <strong>Username already exists!</strong> 
                                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>";
                                        $pass=false;
                                    }
                                }
                            }
                        }
                    }
                    if($pass){
                        if(isset($_POST['password']) && isset($_POST['cpassword'])  && !empty($_POST['chpassword']) && !empty($_POST['cpassword'])){
                            $cpassword = htmlspecialchars(strip_tags($_POST['cpassword']));
                            $chpassword = htmlspecialchars(strip_tags($_POST['chpassword']));
                            if($chpassword !== $cpassword){
                                $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            <strong>Passwords do not match!</strong>.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";
                            }else if(checkInputPassword($cpassword) !==0){
                                $error = checkInputPassword($cpassword, "Changing Password: ");
                                $pass = false;
                            }else if(checkInputPassword($chpassword) !==0){
                                $error = checkInputPassword($chpassword, "Changing Password: ");
                                $pass = false;
                            }else{
                                $password = $cpassword;
                            }
                        }
                    }
                    if($pass){
                        if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
                            $temp_time = time();
                            $file_name = $_FILES['image']['name'];
                            $temp_array = explode(".", $file_name);
                            $file_extension = strtolower(end($temp_array));
                            if(checkValidFileExtension($file_extension)) {
                                $path = "img/profile_image/". $client['uid'].$temp_time.MD5($file_name).".".$file_extension;
                                if(!move_uploaded_file($_FILES['image']['tmp_name'], $path)){
                                    $pass = false;
                                    $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                <strong>Error uploading file</strong> contact admin for help. 
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>";  
                                }
                            }else{
                                $pass = false;
                                $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                <strong>Invalid file format</strong>
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>";  
                            }
                        }
                    }
                    if($pass){    
                        $check = updateUser($username,MD5($password),$email,$path,$client['uid']);
                        if(is_bool($check) && $check){
                            $error="";
                        }else{
                            $error=$check;
                        }
                    }
                   
                }        
            }
            closeDB();
        }
    }
    
?>
<header class="header-section">
    <?php
        include('template/navbar.php'); 
    ?>
</header>
<section class="container text-center" style="min-height: 95vh; margin-bottom: 30px;">
    <div class="col-9 mx-auto mt-5">
        <div class="card">
            <div class="card-body">
                <form class="login-form" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="register-email">Email</label>
                            <input type="email" name="email" class="form-control" id="register-email" placeholder="Email"  value="<?php echo addslashes($email); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="register-username">Username</label>
                            <input type="text" name="username" class="form-control" id="register-username" placeholder="Username"  value="<?php echo addslashes($username); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="register-password" class="col-sm-2 col-form-label">Change Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="chpassword" class="form-control" id="register-new-password" placeholder="New Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="register-con-password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="cpassword" class="form-control" id="register-connew-password" placeholder="Confirm New Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <label for="file" class="col-sm-2 col-form-label"><img src="<?php echo addslashes($client['upfp']); ?>" class="rounded-circle" alt="profile image" style="max-width: 120px; height: auto;"></label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control-file" id="file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="register-con-password" class="col-sm-2 col-form-label">Confirm Changes</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="register-con-password" placeholder="Current Password" required>
                        </div>
                    </div>
                    <?php echo $error; ?>
                    <button type="submit" name="edit" class="btn btn-light">Edit</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="index.php">Back to Home Page</a>
            </div>
        </div>
    </div>
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>