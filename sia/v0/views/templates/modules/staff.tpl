<section class="authors col-12">
    <ul>
    	{foreach $staffs as $staff}
    	<li>
    		<a href="staff/{$staff->link}"><span class="staff-name">{$staff->post_title}</span><img src="{$staff->image}" title="{$staff->post_title}" alt="{$staff->image}" class="img-fluid" /></a>
    	</li>
    {/foreach}
	</ul>
</section>