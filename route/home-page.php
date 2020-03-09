<?php
	global $changes;
	require_once('data/database.php');
	if(connectDB()){
		
		if(!isset($_SESSION['content'])){
			$dir = "data/stat_content/content.json";
			if(file_exists($dir)){
				$content = json_decode(file_get_contents($dir),true);
				$_SESSION['contentid'] = $dir;
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
			$_SESSION['changes'] = false;		
		}
?>

<header class="header-section sticky-top"> 
    <?php
		include('template/navbar.php');          
    ?>

</header>
<section class="container section-main">
	<?php require('data/content-manager.php'); ?>
	<div class="row">
		<div class="col-6">
			<h1>Description</h1>
		</div>
		<div class="col-6">
			<?php if(isset($_SESSION['log'])){?>
				<button class="userEdit" id="e1" data-foo="edit" value="desc"> 
					Edit
				</button>
			<?php }?>
		</div>
		<div class="col-12" id="desc">
			<?php echo$_SESSION['content']['desc']?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<h1>Gameplay</h1>
		</div>
		<div class="col-6">
			<?php if(isset($_SESSION['log'])){?>
				<button class="userEdit" id="e2" data-foo="edit" value="game"> 
					Edit
				</button>
			<?php }?>
		</div>
		<div class="col-12" id="game">
			<?php echo$_SESSION['content']['game']?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<h1>Trivia</h1>
		</div>
		<div class="col-6">
			<?php if(isset($_SESSION['log'])){?>
				<button class="userEdit" id="e3" data-foo="edit" value="triv"> 
					Edit
				</button>
			<?php }?>
		</div>
		<div class="col-12" id="triv">
			<?php echo$_SESSION['content']['triv']?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<h1>News and Events</h1>
		</div>
		<div class="col-6">
			<?php if(isset($_SESSION['log'])){?>
				<button class="userEdit" id="e4" data-foo="edit" value="nwev"> 
					Edit
				</button>
			<?php }?>
		</div>
		<div class="col-12" id="nwev">
			<?php echo$_SESSION['content']['nwev']?>
		</div>
	</div>      
	<?php	
			require('route/content/feature-image.php');
			
		closeDB();
		}
	?>
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
