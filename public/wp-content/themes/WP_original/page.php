<?php get_header(); ?>
<!-- [page .p] -->
<div id="contents" class="clearfix">
	<section id="mainArea">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post content" id="post-<?php the_ID(); ?>">
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</section>
</div>
<!-- //[page .p] -->
<?php get_footer(); ?>