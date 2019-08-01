<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
<link href="assets/styles/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/spectrum.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/jquery-ui/jquery-ui.structure.min.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/main.css" rel="stylesheet" type="text/css" />
<script src="assets/js/jquery-3.3.1.min.js" type="text/javascript" language="javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript" language="javascript"></script>
<script src="assets/js/bootstrap/bootstrap.min.js" type="text/javascript" language="javascript"></script>
<script src="assets/js/spectrum.js" type="text/javascript" language="javascript"></script>
</head>
<body class="container-fluid">
<header class="row">
	<div class="upline col-12">
		<?php if($_POST['step'] != 'dbConfigs' && $_POST['step'] != 'admConfigs'): ?>
		<h4 class="text-center">SIA - INSTALA&Ccedil;&Atilde;O<br /><small class="text-muted">Passo 1 - Instala&ccedil;&atilde;o do Banco de Dados</small></h4>
		<?php elseif($_POST['step'] == 'dbConfigs'): ?>
		<h4 class="text-center">SIA - INSTALA&Ccedil;&Atilde;O<br /><small class="text-muted">Passo 2 - Configura&ccedil;&atilde;o da &Aacute;rea Administrativa</small></h4>
		<?php elseif($_POST['step'] == 'admConfigs'): ?>
		<h4 class="text-center">SIA - INSTALA&Ccedil;&Atilde;O<br /><small class="text-muted">Finaliza&ccedil;&atilde;o</small></h4>
		<?php endif;?>
	</div>
</header>
<div id="content">
