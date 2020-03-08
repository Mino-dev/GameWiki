<?php
	global $changes;
	require_once('data/database.php');
	if(connectDB()){
		
		if(!isset($_SESSION['content'])){
			$dir = getContent();
			if($dir !== false){
				$content = json_decode(file_get_contents($dir['contentpath']),true);
				$_SESSION['contentid'] = $dir['contentid'];
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
?>

<header class="header-section sticky-top"> 
    <?php
		include('template/navbar.php');          
    ?>

</header>
<section class="container section-main">
	<?php
		
		require('route/content/description.php');
		require('route/content/gameplay.php');
		require('route/content/trivia.php');	
		require('route/content/newsevents.php');
		require('route/content/feature-image.php');
		require('data/content-manager.php');
		closeDB();
		}
	?>
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
