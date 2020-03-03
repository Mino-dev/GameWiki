<?php
    if(isset($_SESSION['id']) && isset($_SESSION['log'])){
        $client = $_SESSION['client'];
        $email = $client['uemail'];
        $username = $client['username'];
	}else{
        $email = "";
        $username = "";
    }

    if(isset($_POST['edit'])){
        
        require_once('data/database.php'); 
        if(connectDB()){
            if(checkPassword(MD5($_POST['password']), $client['uid'])){
                
                $error = "";
                $pass = true;
                $password = MD5($_POST['password']);
                $path = $client['upfp'];

                if($_POST['email'] != $client['uemail']){
                    if(!checkIfUniqueEmail($email, $uid)){
                        $error = "email already existing";
                        $pass = false;
                    }
                }
                
                if(isset($_POST['chpassword']) && isset($_POST['cpassword']) && !empty($_POST['chpassword'])){
                    if(!$_POST['chpassword'] == $_POST['cpassword']){
                        $error = "passwords do not match";
                        $pass = false;
                    }else{
                        $password = MD5($_POST['cpassword']);
                    }
                } 
                if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
                    echo "hello";
                    $temp_time = time();
                    $file_name = $_FILES['image']['name'];
                    $temp_name = $_FILES['image']['tmp_name'];
                    $file_extension = explode(".", $file_name);
                    $path = "img/profile_image/". $client['uid'] . $temp_time . MD5($file_name)."." .strtolower(end($file_extension));
                    $upload = move_uploaded_file($temp_name, $path);
                    if(!$upload){
                        $pass = false;
                        $error = "error uploading";   
                    }
                }
                if($pass){
                    if(updateUser($_POST['username'],$password,$_POST['email'],$path, $client['uid'])){
                        if(retrieveUser($client['uid'])){
                            echo "<script type='text/javascript'> window.location='dashboard.php'; </script>";
                        }else{
                            echo "error updating session";                            
                        }
                    }else{
                        echo "error updating database";
                    }
                }else{
                    echo $error;
                }
            }else{
                echo "wrong password";
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
                <input type="file" name="image" class="form-control" id="file">
            </div>
        </div>
        <div class="form-group row">
            <label for="register-con-password" class="col-sm-2 col-form-label">Confirm Changes</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="register-con-password" placeholder="Current Password" required>
            </div>
        </div>
        
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
    </form>
</section>