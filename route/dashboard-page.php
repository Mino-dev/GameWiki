<?php
    if(!isset($_SESSION['log'])){
        echo "<script type='text/javascript'> window.location='login.php'; </script>";
    }
?>
<header class="header-section"> 
    <?php
        include('template/navbar.php');
        $client = $_SESSION['client'];   
    ?>    
</header>
<section class="section-main container">
    <div style="overflow: hidden; width: 15%;">
        <img src="<?php echo $client['upfp']; ?>" class="rounded-circle" alt="profile pic" style="max-width: 100%; height: auto;">
    </div>
    <?php echo "$client[username] <br> $client[uemail] <br>" ?>
    <a href="edit.php">Edit Profile</a>
    
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>