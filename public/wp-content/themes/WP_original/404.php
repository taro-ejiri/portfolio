<?php get_header(); ?>
<!-- 404.php -->
<div id="contents" class="clearfix">
	<section id="area404">
		<h2>指定されたページは存在しておりません。</h2>
		<p>このページの URL ：<span class="error_msg">http://<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?></span></p>
		<p>表示する記事がありません。</p>
		<p><a href="<?php echo home_url(); ?>">トップページへ戻る</a></p>
	</section>
</div>
<?php get_footer(); ?>