<header class="header-section"> 
    <?php
        
        require_once('data/database.php');
        include('template/navbar.php');
        if(connectDB()){
            
            closeDB();
        }            
    ?>

</header>
<section class="section-main containter">
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>