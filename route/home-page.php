<?php
	if(!isset($_SESSION['content'])){
		$_SESSION['content'] = "ddd";
	}
	require_once('data/database.php');
	if(connectDB()){ 
		closeDB();
	} 
?>

<header class="header-section sticky-top"> 
    <?php
		include('template/navbar.php');          
    ?>

</header>
<section class="container section-main">
	<?php
		require('route/content/description.php');
		require('route/content/trivia.php');
		require('route/content/gameplay.php');
		require('route/content/changelogs.php');
		require('route/content/newsevents.php');
	?>
</section>
<footer class="fixed-bottom footer-section">
    <?php include('template/footer.php'); ?>
</footer>
