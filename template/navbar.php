<?php
	if(isset($_SESSION['log'])&& $_SESSION['log']){
		$client = $_SESSION['client'];
		$usn = "<a class='dropdown-item'>$client[username]</a>";
		$type = $client['utype'];
		$ed= "<a class='dropdown-item' href='edit.php'>Edit your profile</a>";
		$src = $client['upfp'];
		$control = "<a class='dropdown-item' href='logout.php'>Log Out</a>";
	}else{
		$type = 1;
		$ed = "";
		$usn = "";
		$src = "img/default.png";
		$control = "<a class='dropdown-item' href='login.php'>Log In</a>";
		$usn = "";
	}
?>

<div class="row no-padding">
	<div class="col-md-12 col-navbar">
		<nav class='navbar navbar-expand-lg navbar-custom'>
			<a class='navbar-brand'>Idle Fishing Lagoon Wiki</a>
				<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
					<span class='navbar-toggler-icon'></span>
				</button>
			<div class='collapse navbar-collapse' id='navbarSupportedContent'>
				<ul class='navbar-nav mr-auto'>
					<li class='nav-item'>
						<a class='nav-link' href='index.php'>Home</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='https://mabungaccs026.000webhostapp.com/idle/home.php'>Play Game!</a>
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
								echo $ed;?>
							<div class="dropdown-divider"></div>
							<a class='dropdown-item' href='register.php'>Register Now!</a>
							<?php echo $control; ?>
							
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
