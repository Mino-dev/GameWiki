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
	<?php require('handlers/content-handler.php'); ?>
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
	    
	<form method="post" enctype="multipart/form-data">     
		<div class="form-row">
			<div class="col-12">
				<h1>Featured Image</h1>
			</div>
		</div>
		<div class="form-row">
			<div class="col preview">
				<image src="<?php echo$_SESSION['content']['fimg']?>">
			</div>
		<?php if(isset($_SESSION['log'])){?>
			<div class="form-row">
				<div class="col">
					<input type="file" name="file" class="form-control" id="file">
					<button id="e5" value="fimg"> 
						Upload
					</button>
				</div>
			</div>
		<?php }?>	
	</form>     
	<?php	
		closeDB();
		}
	?>
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
