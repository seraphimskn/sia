<?php
/* Smarty version 3.1.30, created on 2018-03-27 22:24:20
  from "C:\xampp\htdocs\bandnews\site\views\templates\commons\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abaa8748d0dc7_25047490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0b7efdd4b352e39ade15ab409a0834136947f98' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\commons\\header.tpl',
      1 => 1522182241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abaa8748d0dc7_25047490 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="pt-br">
<head>
<base href="<?php echo $_smarty_tpl->tpl_vars['baseHREF']->value;?>
" />
<meta charset="utf-8" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
" />
<meta name="robots" content="follow, index" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no, width=device-width">
<?php echo $_smarty_tpl->tpl_vars['styles']->value;?>

<?php echo $_smarty_tpl->tpl_vars['scripts']->value;?>

<title><?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
</title>
</head>
<body>
<header>
	<nav id="mobile-navigation">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navItem']->value, 'link');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->slug;?>
"><?php echo $_smarty_tpl->tpl_vars['link']->value->page;?>
</a>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<form enctype="multipart/form-data" action="" method="post">
			<input type="text" placeholder="Busca" required>
			<a href="#" class="search"><i class="fa fa-search" aria-hidden="true"></i></a>
		</form>
	</nav>
	<div id="logo" class="mobile">
		<a href="./"><img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['logo_title']->value;?>
" class="img-fluid"></a>
	</div>
	<section id="banner">
		<?php if (is_array($_smarty_tpl->tpl_vars['bannerSlideImage']->value)) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bannerSlideImage']->value, 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->the_path;?>
" title="<?php echo $_smarty_tpl->tpl_vars['image']->value->the_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['image']->value->the_name;?>
" class="img-fluid" />
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<?php } else { ?>
			<span><?php echo $_smarty_tpl->tpl_vars['bannerSlideImage']->value;?>
</span>
		<?php }?>
	</section>
	<section id="header-streaming">
		<?php if (isset($_smarty_tpl->tpl_vars['streaming']->value) && $_smarty_tpl->tpl_vars['streaming']->value != '') {?>
			<a href="#" data-url="<?php echo $_smarty_tpl->tpl_vars['streaming']->value;?>
"><img src="assets/imgs/listenStreaming.png" alt="listenStreaming" title="Ouça a R&aacute;dio ON-LINE" class="img-fluid" /></a>
		<?php } else { ?>
			<img src="assets/imgs/streamingOut.png" alt="streamingOut" title="R&aacute;dio ON-LINE fora do ar, voltaremos em breve!" class="img-fluid" />
		<?php }?>
	</section>
	<section id="main-navigation">
		<div id="logo">
			<a href="./"><img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['logo_title']->value;?>
" class="img-fluid"></a>
		</div>
		<div id="date"><?php echo utf8_encode($_smarty_tpl->tpl_vars['date']->value);?>
</div>
		<nav>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navItem']->value, 'link');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->slug;?>
"><?php echo $_smarty_tpl->tpl_vars['link']->value->page;?>
</a>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<form enctype="multipart/form-data" action="" method="post">
				<input type="text" placeholder="Busca" required>
				<a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
			</form>
		</nav>
	</section>
</header>
<div id="main-content"><?php }
}
