
<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['log'])){
        $client = $_SESSION['client'];
        $email = $client['uemail'];
        $username = $client['username'];
	}else{
        $email = "";
        $username = "";
    }
    if(isset($_POST['edit'])){
        $tusername = $_POST['username'];
    }
?>

<header class="e:header-section header-section">
    <?php
        
        require_once('data/database.php');
        if(connectDB()){
            include('template/navbar.php');   
        }
    ?>
</header>
<section class="e:main-section container">
    <form class="login-form" method="post">
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
            <label for="register-password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="register-password" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <label for="register-con-password" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" name="cpassword" class="form-control" id="register-con-password" placeholder="Confirm Password">
            </div>
        </div>
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
    </form>
</section>