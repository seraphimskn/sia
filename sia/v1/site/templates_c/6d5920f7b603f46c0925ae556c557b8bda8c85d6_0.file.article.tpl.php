<?php
/* Smarty version 3.1.30, created on 2018-03-28 18:09:23
  from "C:\xampp\htdocs\bandnews\site\views\templates\content\article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abbbe331d1562_07902232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d5920f7b603f46c0925ae556c557b8bda8c85d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\content\\article.tpl',
      1 => 1522180915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abbbe331d1562_07902232 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['facebookSDK']->value;?>

<?php echo $_smarty_tpl->tpl_vars['twitterSDK']->value;?>

<div class="internal main row">
	<section class="pagetitle row">
		<h2><?php echo $_smarty_tpl->tpl_vars['post']->value->post_title;?>
</h2>
		<div class="socialmedias">
		<span>Siga-nos em nossas redes sociais</span>
		<div class="links">
			<a href="<?php echo $_smarty_tpl->tpl_vars['youtube_link']->value;?>
" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['facebook_link']->value;?>
" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['twitter_link']->value;?>
" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['instagram_link']->value;?>
" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
		</div>
	<span class="author"><a href="staff/<?php echo $_smarty_tpl->tpl_vars['post']->value->author_link;?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value->author_name;?>
</a> - <?php echo $_smarty_tpl->tpl_vars['post']->value->date;?>
</span>
	</section>
	<section class="col-md-7 col-xs-12 no-wrap">
    	<article id="article-view-<?php echo $_smarty_tpl->tpl_vars['post']->value->ID;?>
" class="col-12 article-view">
        	<?php if (isset($_smarty_tpl->tpl_vars['post']->value->options->Destaque)) {?>
        		<?php echo $_smarty_tpl->tpl_vars['post']->value->options->Destaque;?>

        	<?php }?>
        	<div class="content col-12">
        		<?php echo $_smarty_tpl->tpl_vars['post']->value->post_value;?>

        	</div>
        	<div class="share col-12">
        		<div class="facebook">
        			<div class="fb-share-button" 
        					data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
        		</div>
        		<div class="tweet">
        			<a class="twitter-share-button"
  						href="https://twitter.com/intent/tweet">Tweet</a>
        		</div>
        	</div>
		</article>
	</section>
	<section class="col-md-5 col-xs-12 right modules">
		<section class="authors col-12">
    		<ul>
    			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staffs']->value, 'staff');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['staff']->value) {
?>
    			<li>
    				<a href="staff/<?php echo $_smarty_tpl->tpl_vars['staff']->value->link;?>
"><span class="staff-name"><?php echo $_smarty_tpl->tpl_vars['staff']->value->post_title;?>
</span><img src="<?php echo $_smarty_tpl->tpl_vars['staff']->value->image;?>
" title="<?php echo $_smarty_tpl->tpl_vars['staff']->value->post_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['staff']->value->image;?>
" class="img-fluid" /></a>
    			</li>
   			 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</ul>
		</section>
		<section id="twitter" class="twitter-view col-12">
	<a class="twitter-timeline" data-width="100%"
		data-chrome="noheader nofooter noscrollbar"
		data-height="500"
		href="https://twitter.com/radiobandnewsfm?ref_src=twsrc%5Etfw">Siga a BandNewsFMES</a>
			<?php echo '<script'; ?>
 async src="https://platform.twitter.com/widgets.js"
		charset="utf-8"><?php echo '</script'; ?>
>
		</section>
	</section>
</div><?php }
}
