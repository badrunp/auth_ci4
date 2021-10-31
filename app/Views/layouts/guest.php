
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title><?= $title; ?></title>

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
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	
    <?= $this->renderSection('content'); ?>

	<!-- js -->
	<script src="<?= base_url(); ?>/scripts/corea.js"></script>
	<script src="<?= base_url(); ?>/scripts/script.min.js"></script>
	<script src="<?= base_url(); ?>/scripts/process.js"></script>
	<script src="<?= base_url(); ?>/scripts/layout-settings.js"></script>
</body>
</html>