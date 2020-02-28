<header class="lr:header-section header-section">
    <?php
        session_start();
        require_once('data/database.php');
        if(connectDB()){
            include('template/navbar.php');
            closeDB();
        }
    ?>
</header>