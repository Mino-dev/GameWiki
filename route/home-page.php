<?php
	global $changes;
	require_once('data/database.php');
	if(connectDB()){
		
		if(!isset($_SESSION['content'])){
			if(file_exists("data/content-json/JSON_SAMPLE.json")){	
				$content = json_decode(file_get_contents("data/content-json/JSON_SAMPLE.json"),true);
			}
			else{
				$content = array(
					"desc"=>"",
					"game"=>"",
					"triv"=>"",
					"nwev"=>"",
					"fimg"=>""
				);
			}
			$_SESSION['content'] = $content;
			$changes = false;
		}
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
		require('route/content/newsevents.php');
		require('route/content/feature-image.php');
		require('data/content-manager.php');
	?>
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
