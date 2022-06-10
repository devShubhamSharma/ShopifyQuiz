<?php session_start();
session_destroy();
$config = include('../config.php') ?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simpla Admin | Sign In</title>
<link rel="stylesheet" href="<?= $config->admin_assets_url .'css/reset.css'?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= $config->admin_assets_url .'css/style.css'?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= $config->admin_assets_url .'css/invalid.css" type="text/css'?>" media="screen" />	
<script type="text/javascript" src="<?= $config->admin_assets_url .'scripts/jquery-1.3.2.min.js'?>"></script>
<script type="text/javascript" src="<?= $config->admin_assets_url .'scripts/simpla.jquery.configuration.js'?>"></script>
<script type="text/javascript" src="<?= $config->admin_assets_url .'scripts/facebox.js'?>"></script>
<script type="text/javascript" src="<?= $config->admin_assets_url .'scripts/jquery.wysiwyg.js'?>"></script>
</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="<?= $config->admin_assets_url .'images/logo.png'?>" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="index.html">
				
					<div class="notification information png_bg">
						<div>
							Just click "Sign In". No password needed.
						</div>
					</div>
					
					<p>
						<label>Username</label>
						<input class="text-input" type="text" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" />
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign In" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
  </body>
</html>
