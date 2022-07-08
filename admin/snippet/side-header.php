<div class="container-fluid page-body-wrapper">
	<!-- partial:partials/_sidebar.html -->
	<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
			<li class="nav-item nav-category">Main</li>
			<li class="nav-item <?= ($file_self[3]=='dashboard') ? ' active ': ''?>">
				<a class="nav-link" href="<?= $config->admin_url .'dashboard.php'?>">
					<span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
					<span class="menu-title">Dashboard</span>
				</a>
			</li>
			<li class="nav-item <?= ($file_self[3]=='questions') ? ' active ': ''?>">
				<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="<?= ($file_self[3]=='questions') ? 'true': 'false'?>" aria-controls="ui-basic">
					<span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
					<span class="menu-title">Questions</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-basic">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item <?php if($file_self[3]=='questions' && $js_file =='list' ){ echo " active";}?>"> <a class="nav-link" href="<?= $config->admin_url .'questions/list.php'?>">List</a></li>
						<li class="nav-item <?php if($file_self[3]=='questions' && $js_file =='add' ){ echo " active";}?>"> <a class="nav-link" href="<?= $config->admin_url .'questions/add.php'?>">Add</a></li>
						
					</ul>
				</div>
			</li>
			<li class="nav-item sidebar-user-actions">
				<div class="sidebar-user-menu">
					<a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
						<span class="menu-title">Settings</span>
					</a>
				</div>
			</li>
			
			<li class="nav-item sidebar-user-actions">
				<div class="sidebar-user-menu">
					<a href ="<?= $config->admin_url .'logout.php'?>" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
						<span class="menu-title">Log Out</span></a>
				</div>
			</li>
		</ul>
	</nav>
	<!-- partial -->
	
<div class="main-panel">
	