<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Dashboard | <?= $title ?? ''; ?></title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
	<div class="header">
		<div class="header-left"></div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?= base_url('uploads/' . auth('image')); ?>" alt="">
						</span>
						<span class="user-name"><?= auth('name') ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="<?= base_url('user/profile'); ?>"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="<?= base_url('/logout'); ?>"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="<?= base_url(); ?>/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?= base_url(); ?>/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Tables</span>
						</a>
						<ul class="submenu">
							<li><a href="basic-table.html">Basic Tables</a></li>
							<li><a href="datatable.html">DataTables</a></li>
						</ul>
					</li> -->

					<?php
					$db = db_connect();

					$userMenu = $db->table('user_menu')->join('user_access_menu', 'user_menu.id = user_access_menu.user_menu')->where(['user_access_menu.user_role' => auth('role')])->get()->getResultArray();
					?>

					<li>
						<a href="<?= base_url('/'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>


					<?php foreach ($userMenu as $menu) : ?>
						<li>
							<div class="dropdown-divider"></div>
						</li>

						<li>
							<div class="sidebar-small-cap"><?= $menu['title']; ?></div>
						</li>

						<?php $subMenu = $db->table('user_menu_submenu')->where(['user_menu' => $menu['user_menu']])->get()->getResultArray() ?>

						<?php foreach ($subMenu as $sub) : ?>
							<li>
								<a href="<?= base_url($sub['url']); ?>" class="dropdown-toggle no-arrow">
									<span class="micon <?= $sub['icon']; ?>"></span><span class="mtext"><?= $sub['title']; ?></span>
								</a>
							</li>
						<?php endforeach; ?>


					<?php endforeach; ?>


					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<a href="<?= base_url('/logout'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-logout"></span><span class="mtext">Logout</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<?= $this->renderSection('content'); ?>

	<!-- js -->
	<script src="<?= base_url(); ?>/scripts/core.js"></script>
	<script src="<?= base_url(); ?>/scripts/script.min.js"></script>
	<script src="<?= base_url(); ?>/scripts/script.js"></script>
	<script src="<?= base_url(); ?>/scripts/process.js"></script>
	<script src="<?= base_url(); ?>/scripts/layout-settings.js"></script>
	<script src="<?= base_url(); ?>/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
	<script src="<?= base_url(); ?>/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="<?= base_url(); ?>/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="<?= base_url(); ?>/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="<?= base_url(); ?>/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?= base_url(); ?>/scripts/dashboard2.js"></script>
</body>

</html>