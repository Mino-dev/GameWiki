<?php
    $error = "";
    if(isset($_SESSION['log'])&&$_SESSION['log']){
        $client = $_SESSION['client'];
        $email = $client['uemail'];
        $username = $client['username'];
	}

    if(isset($_POST['edit'])){
        require('handlers/input-validation-handler.php');
        require_once('data/database.php'); 
        if(connectDB()){
            $password = MD5(strip_tags($_POST['password']));
            if(checkPassword($password, $client['uid'])){
                $pass = true;
                $username = strip_tags($_POST['username']);
                $email = strip_tags($_POST['email']);
                $chpassword = strip_tags($_POST['chpassword']);
                $cpassword= strip_tags($_POST['cpassword']); 
                

                $path = $client['upfp'];
                if($pass){
                    if($email != $client['uemail']){
                        if(!checkIfUniqueEmail($_POST['email'],$client['uid'])){
                            $error =    "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            <strong>Email already existing!</strong> 
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>"; 
                            $pass = false;
                        }
                    }
                }
                if($pass){
                    if($username != $client['username']){ 
                        if(checkInputUsername($username) == 0){
                            if(!checkIfUniqueUsername($username, $client['uid'])){
                                $error =    "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                <strong>Username already existing!</strong> 
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>";
                                $pass = false;
                            }
                        }else{
                            $error = checkInputUsername($username);
                            $pass = false;
                        }     
                    }
                }
                if($pass){
                    if(isset($_POST['chpassword']) && isset($_POST['cpassword']) && !empty($_POST['chpassword'])){
                        if($_POST['chpassword'] !== $_POST['cpassword']){
                            $error= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>Passwords do not match</strong> 
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>"; 
                            $pass = false;
                        }else{
                            
                            if(checkInputPassword($cpassword)===0){
                                $password = MD5($cpassword);
                            }else{
                                $error = checkInputPassword($cpassword);
                                $pass=false;
                            }
                            
                        }
                    } 
                }
                if($pass){
                    if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
                        $temp_time = time();
                        $file_name = $_FILES['image']['name'];
                        $temp_array = explode(".", $file_name);
                        $valid_extensions = array("jpg","jpeg","png","gif");
                        $file_extension = strtolower(end($temp_array));
                        if(in_array($file_extension,$valid_extensions) ) {
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
                    if(updateUser($username,$password,$email,$path,$client['uid'])){
                        $error="";
                        echo "<script type='text/javascript'> window.location='dashboard.php'; </script>";
                    }else{
                        $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>Error with database</strong> contact the admin for help.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                }
            }else{
                $error="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>Incorrect password</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
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
<section class="section-main container">
    <form class="login-form" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="register-email">Email</label>
                <input type="email" name="email" class="form-control" id="register-email" placeholder="Email"  value="<?php echo $email?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="register-username">Username</label>
                <input type="text" name="username" class="form-control" id="register-username" placeholder="Username"  value="<?php echo $username?>" required>
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
            
            <label for="file" class="col-sm-2 col-form-label"><img src="<?php echo $client['upfp']; ?>" class="rounded-circle" alt="profile image" height="150px" width="120px"></label>
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
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>