<header class="hp:header-section header-section"> 
    <?php
        include('template/navbar.php');
        $client = $_SESSION['client'];   
    ?>
    <img src="<?php echo $client['upfp']; ?>" class="rounded-circle" alt="profile pic" height="150px" width="120px">
    <?php echo "$client[username] <br> $client[uemail] <br>" ?>
    <a href="edit.php">Edit Profile</a>
    
</header>
