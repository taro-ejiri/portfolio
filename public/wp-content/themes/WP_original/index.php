<?php get_header(); ?>
<main id="main">
  <?php while(have_posts()) : ?><?php the_post(); ?>
  <article class="p-article-list c-media"><?php if(has_post_thumbnail()): ?><a class="c-media__img p-article-list__thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('class' => 'p-article-list__catch p-article-list__catch--main')); ?></a><?php endif; ?>
  <div class="c-media__body">
  	<h1 class="p-article-list__ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  	<p class="c-media__txt p-article-list__snippet"><?php the_excerpt(); ?></p>
  </div>
	<time class="c-panel p-article-list__time" datetime="<?php the_time('c'); ?>"><?php the_time("Y/n/j") ?></time><a class="p-article-list__readmore" href="<?php the_permalink(); ?>">続きを読む</a>
  </article><?php endwhile;
the_posts_pagination(array(
  'mid_size'        => 2,
  'prev_text'       => 'Prev',
  'next_text'       => 'Next',
  'show_all'        => false,
  'before_page_number' => '',
)); ?>
</main><?php get_sidebar(); //追加
get_footer(); ?>
