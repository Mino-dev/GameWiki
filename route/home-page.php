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
	<div class="content-wrapper">
		<div id="saveButton">
			<?php require('handlers/content-handler.php'); ?>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h1>Description</h1>
			</div>
			<div class="col-md-8">
				<button class="userEdit btn btn-link" id="e1" data-foo="edit" value="desc"
				style="display:<?php echo (isset($_SESSION['log']))? "inherit" : "none"; ?>;">
					[ Edit ]
				</button>
			</div>
			<div class="hr col-12"><hr></div>
			<div class="col-12 homepagecontent" id="desc">
				<?php echo$_SESSION['content']['desc']?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<h1>Gameplay</h1>
			</div>
			<div class="col-md-8">
				<button class="userEdit btn btn-link" id="e2" data-foo="edit" value="game"
				style="display:<?php echo (isset($_SESSION['log']))? "inherit" : "none"; ?>;">
					[ Edit ]
				</button>
			</div>
			<div class="hr col-12"><hr></div>
			<div class="col-12 homepagecontent" id="game">
				<?php echo$_SESSION['content']['game']?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<h1>Trivia</h1>
			</div>
			<div class="col-md-8">
				<button class="userEdit btn btn-link" id="e3" data-foo="edit" value="triv"
					style="display:<?php echo (isset($_SESSION['log']))? "inherit" : "none"; ?>;">
					[ Edit ]
				</button>
			</div>
			<div class="hr col-12"><hr></div>
			<div class="col-12 homepagecontent" id="triv">
				<?php echo$_SESSION['content']['triv']?>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-md-4">
				<h1>News and Events</h1>
			</div>
			<div class="col-12 col-md-8">
				<button class="userEdit btn btn-link" id="e4" data-foo="edit" value="nwev"
					style="display:<?php echo (isset($_SESSION['log']))? "inherit" : "none"; ?>;">
					[ Edit ]
				</button>
			</div>
			<div class="hr col-12"><hr></div>
			<div class="col-12 homepagecontent" id="nwev">
				<?php echo$_SESSION['content']['nwev']?>
			</div>
		</div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col-12">
					<h1>Featured Image</h1>
				</div>
			</div>
			<div class="hr col-12"><hr></div>
			<div class="homepagecontent">
				<div class="form-row">
					<div class="col-12 preview">
						<image src="<?php echo$_SESSION['content']['fimg']?>">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4">
						<div class="btn btn-light" style="display:<?php echo (isset($_SESSION['log']))? "inherit" : "none"; ?>;">
							<input type="file" name="file" id="file">
						</div>
					</div>
					<div class="col-md-8">
						<button id="e5" class="btn btn-light" value="fimg"
							style="display:<?php echo (isset($_SESSION['log']))? "inherit" : "none"; ?>;">
							Upload
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
	<?php
		closeDB();
		}
	?>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
