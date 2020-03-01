<header class="hp:header-section header-section"> 
    <?php
        
        require_once('data/database.php');
        include('template/navbar.php');
        if(connectDB()){
            
            closeDB();
        }            
    ?>

</header>
