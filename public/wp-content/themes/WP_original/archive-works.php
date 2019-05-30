<?php get_header(); ?>
<!-- [archive-works .p]  -->
<div id="mainArea">
  <section id="work-list">
	<h2 class="top">WORKS</h2>
	<h3>実績</h3>
	<div class="menuFrame">
		<ul>
			<li><a href="#" data-filter="*" class="current">ALL</a></li>
			<li><a href="#" data-filter=".corporate">CORPORATE</a></li>
			<li><a href="#" data-filter=".campaign">CAMPAIGN</a></li>
			<li><a href="#" data-filter=".wordpress">WordPress</a></li>
			<li><a href="#" data-filter=".landing">Landing Page</a></li>
			<li><a href="#" data-filter=".responsive">RESPONSIVE</a></li>
			<li class="last"><a href="#" data-filter=".other">OTHER</a></li>
		</ul>
	</div>
	
	  <ul class="menuContainer container">
		<?php if (have_posts()) : ?>
		  <?php
		  $args = array(/* 配列に複数の引数を追加 */
			'post_type' => 'works',/* 投稿タイプを指定 */
			'order' => 'DESC',
			'posts_per_page' => '-1' //表示件数。-1なら全件表示
		  );
		  $the_query = new WP_Query( $args );
		  ?>
		  <?php query_posts( $args ); //上で指定したクエリ（問い合わせ内容）の指定 ?>
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?><!-- ループ開始処理 -->
			<li class="
			  <?php // サイトの種類名をclassとして追加
				$colors = get_field('siteType');
				if ($colors): 
				  ?>
				<?php
				foreach ($colors as $color) : ?>
				<?php echo $color; ?>
				<?php endforeach; ?>
				<?php endif; ?> worksFrame">

			  	<a href="<?php the_permalink(); ?>">
				<div class="ot-portfolio-item">
					<figure class="effect-bubba">
						<?php //写真設定
						$image = get_field('archiveIMG');
						$alt = $image['alt'];
						$url = $image['sizes']['large'];
						?>
						<img src="<?php echo $url ?>" alt="<?php echo $alt ?>">
						<figcaption>
						 <h2><?php echo get_the_title(); ?><br><span class="small">BY <?php the_field('client'); ?></span></h2>
						 <?php 
						 	$checked = get_field('newMark');
							if($checked){ //管理画面で「NEW」のチェックボックスを入れていたら
							echo '<span class="new">NEW</span>'; //赤のアイコンを表示する
							}
						 ?>
						</figcaption>
				  	</figure>
				</div>
				<div class="client_mini">
					<p><?php the_field('sitename'); ?> BY <?php the_field('client'); ?></p>
				</div>
			  </a>
			</li>
		  <?php endwhile; // end of the loop. ?>
		</ul>

		<?php wp_reset_query(); ?><!-- ここでリセット -->

	  </section>
	<?php endif; ?>
</div>
<!-- [//archive-works .p]  -->
<?php get_footer(); ?>