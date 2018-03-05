<div class="internal main row">
	<section class="pagetitle row">
		<h2>{$page->page_title}</h2>
		<div class="socialmedias">
		<span>Siga-nos em nossas redes sociais</span>
		<div class="links">
			<a href="{$youtube_link}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
			<a href="{$facebook_link}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="{$twitter_link}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="{$instagram_link}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
	</div>
	</section>
	<section class="col-5 about content">
		<form enctype="multipart/form-data" method="post" class="form-control" action="">
			<input type="text" class="form-control" placeholder="Nome:" required />
			<input type="email" class="form-control" placeholder="E-mail:" required />
			<input type="text" class="form-control" placeholder="Assunto:" required />
			<textarea class="form-control" placeholder="Motivo do contato:" required></textarea>
			<button type="submit" name="enviar">Enviar</button>
		</form>
	</section>
</div>