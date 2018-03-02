<section class="authors col-10">
	{foreach $staffs as $staff}
	<article class="col-10">
		<a href="staff/{$staff->link}">
			<h5 class="staff-name">{$staff->post_title}</h5> <img
			src="{$staff->image}" title="{$staff->post_title}"
			alt="{$staff->image}" />
		</a>
	</article>
	{/foreach}
</section>