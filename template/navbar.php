<?php
	if(isset($_SESSION['id']) && isset($_SESSION['log'])){
		$client = $_SESSION['client'];
		$usn = "<a class='dropdown-item'>$client[username]</a>";
		$type = $client['utype'];
		$dashboard= "<a class='dropdown-item' href='dashboard.php'>Dashboard</a>";
		$src = $client['upfp'];
		$control = "<a class='dropdown-item' href='logout.php'>Log Out</a>";
		
	}else{
		$type = 1;
		$dashboard = "";
		$usn = "";
		$src = "img/default.png";
		$control = "<a class='dropdown-item' href='login.php'>Log In</a>";
		$usn = "";
	}
?>

<div class="row row-no-padding">
	<div class="col-12">
		<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
			<a class='navbar-brand'>Navbar</a>
				<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
					<span class='navbar-toggler-icon'></span>
				</button>
			<div class='collapse navbar-collapse' id='navbarSupportedContent'>
				<ul class='navbar-nav mr-auto'>
					<li class='nav-item'>
						<a class='nav-link' href='index.php'>Home</a>
					</li>
				</ul>
				<?php echo ($type == 1)?
							"":
							"<ul class='navbar-nav'>
								<li class='nav-item'>
									<a class='nav-link' href='admin.php'>Admin</a>
								</li>
							</ul>";
				?>
				<ul class="navbar-nav >">
					<li class="nav-item dropdown">
						
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="overflow: hidden;">
							<img src="<?php echo $src;?>"	width="40" height="40" class="rounded-circle">
						</a>
						<div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
							<?php echo $usn; 
								echo $dashboard;?>
							<div class="dropdown-divider"></div>
							<?php echo $control; ?>
						</div>
					</li> 
				</ul>  
			</div>
		</nav>
	</div>
</div>
