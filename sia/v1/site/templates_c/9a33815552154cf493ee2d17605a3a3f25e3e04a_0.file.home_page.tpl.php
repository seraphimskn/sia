<?php
/* Smarty version 3.1.30, created on 2018-03-29 16:34:50
  from "C:\xampp\htdocs\bandnews\site\views\templates\commons\home_page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abcf98ae89633_64624506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a33815552154cf493ee2d17605a3a3f25e3e04a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\commons\\home_page.tpl',
      1 => 1522333648,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abcf98ae89633_64624506 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['facebookSDK']->value;?>

<?php echo $_smarty_tpl->tpl_vars['carousel']->value;?>

<section id="top" class="row">
	<div class="radiostreaming col-md-3 col-xs-12">
		<a href="#" data-url="<?php echo $_smarty_tpl->tpl_vars['streamingUrl']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['streamingButton']->value;?>
" title="Ou&ccedil;a a R&aacute;dio BANDNEWS ao vivo!" alt="radio-online" class="img-fluid" /></a>
	</div>
	<div class="socialmedias col-md-9 col-xs-12">
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
	<div id="carousel" class="row">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staffs']->value, 'staff');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['staff']->value) {
?>
			<article class="element">
				<a href="staff/<?php echo $_smarty_tpl->tpl_vars['staff']->value->link;?>
" class="col-md-12 col-xs-12">
					<img src="<?php echo $_smarty_tpl->tpl_vars['staff']->value->image;?>
" title="<?php echo $_smarty_tpl->tpl_vars['staff']->value->post_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['staff']->value->image;?>
" class="img-fluid" />
					<h2 class="staff-name"><?php echo $_smarty_tpl->tpl_vars['staff']->value->post_title;?>
</h2>
					<p class="excerpt"><?php echo $_smarty_tpl->tpl_vars['staff']->value->excerpt;?>
</p>
				</a>
			</article>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</div>
</section>
<div id="mid" class="row">
    <section class="col-md-7 col-xs-12 ">
        <section class="latest-news row">
        <?php if (isset($_smarty_tpl->tpl_vars['posts']->value)) {?>
        	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
        	<article id="article-view-<?php echo $_smarty_tpl->tpl_vars['post']->value->ID;?>
" class="col-md-11 col-xs-12 home-view">
        		<a href="article/<?php echo $_smarty_tpl->tpl_vars['post']->value->link;?>
" class="featured-image link"><?php echo $_smarty_tpl->tpl_vars['post']->value->post_options->Destaque;?>
</a>
        		<small><a href="staff/<?php echo $_smarty_tpl->tpl_vars['post']->value->author_link;?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value->author_name;?>
 - </a> <?php echo $_smarty_tpl->tpl_vars['post']->value->date;?>
</small>
        		<a href="article/<?php echo $_smarty_tpl->tpl_vars['post']->value->link;?>
" class="title link"><?php echo $_smarty_tpl->tpl_vars['post']->value->post_title;?>
</a>
        		<a href="article/<?php echo $_smarty_tpl->tpl_vars['post']->value->link;?>
" class="excerpt">
        			<p><?php echo $_smarty_tpl->tpl_vars['post']->value->excerpt;?>
</p>
        		</a>
        	</article>
        	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
        </section>
        <section class="externals row">
            <section class="featured-video col-md-12 col-xs-12">
            <h2>V&iacute;deo em destaque</h2>
            <?php if (isset($_smarty_tpl->tpl_vars['video']->value)) {?>
            	<?php echo $_smarty_tpl->tpl_vars['video']->value->post_value;?>
	
            <?php }?>
            </section>
            <section id="twitter" class="twitter-view col-md-6 col-xs-12">
            	<a class="twitter-timeline" 
            	   data-width="100%"  
            	   data-chrome="noheader nofooter noscrollbar"
            	   data-height="700"
            	   href="https://twitter.com/radiobandnewsfm?ref_src=twsrc%5Etfw">Siga a BandNewsFMES</a> 
            	   <?php echo '<script'; ?>
 async src="https://platform.twitter.com/widgets.js" charset="utf-8"><?php echo '</script'; ?>
>
            </section>
            <section id="facebook" class="facebook-view col-md-5 col-xs-12">
            	<div class="fb-page" data-href="https://www.facebook.com/Bandnewses" 
                    	data-tabs="timeline" 
                    	data-small-header="false" 
                    	data-adapt-container-width="true" 
                    	data-hide-cover="false" 
                    	data-show-facepile="true"
                    	data-height="700">
                    <blockquote cite="https://www.facebook.com/Bandnewses" class="fb-xfbml-parse-ignore">
                    	<a href="https://www.facebook.com/Bandnewses">BandNews FM Espírito Santo</a>
                	</blockquote>
                </div>
            </section>
    	</section>
    </section>
    <section class="col-md-5 col-xs-12">
        <section class="mostReaded col-md-12 col-xs-12">
        	<h2>MAIS LIDAS</h2>
    		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['most_readed']->value, 'bestnew');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bestnew']->value) {
?>
    			<article id="article-view-<?php echo $_smarty_tpl->tpl_vars['bestnew']->value->ID;?>
" class="col-12 home-view">
        		<small><a href="staff/<?php echo $_smarty_tpl->tpl_vars['bestnew']->value->author_link;?>
"><?php echo $_smarty_tpl->tpl_vars['bestnew']->value->author_name;?>
</a> - <?php echo $_smarty_tpl->tpl_vars['bestnew']->value->date;?>
</small>
        		<a href="article/<?php echo $_smarty_tpl->tpl_vars['bestnew']->value->link;?>
" class="excerpt">
        			<p><?php echo $_smarty_tpl->tpl_vars['bestnew']->value->excerpt;?>
</p>
        		</a>
        	</article>
    		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    		<a href="articles" class="more">MAIS NOT&Iacute;CIAS</a>
    	</section>
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
    	<section class="newsletter col-md-12 col-xs-12">
    		<form enctype="multipart/form-data" method="post" action="">
    			<input type="email" placeholder="E-mail" name="newsletter-subscribe" required class="form-control"/><button type="submit" name="enviar" class="btn btn-light">RECEBER NEWSLETTER</button>
    		</form>
    	</section> 
    </section>
</div><?php }
}
