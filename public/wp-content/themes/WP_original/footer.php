</div><!-- /.wrapper -->

<!-- Back to top button -->
<div id="app-pagetop" v-cloak>
	<transition>
		<div id="pagetop" v-show="scY > 200" @click="toTop" v-transition>
			<i class="fa fa-chevron-up"></i>
		</div>
	</transition>
</div>

<footer>
	<div class="f_share_btn">
		<ul>
			<li><a href="https://twitter.com/sept11_1976"><img
						src="<?php bloginfo('template_url'); ?>/img/sns/twitter_out.png" alt="twitter" width="50"></a>
			</li>
			<li><a href="https://www.facebook.com/sept.eleven.jpn"><img
						src="<?php bloginfo('template_url'); ?>/img/sns/fb_out.png" alt="facebook" width="50"></a></li>
			<li><a href="https://github.com/taro-ejiri/portfolio.local"><img
						src="<?php bloginfo('template_url'); ?>/img/sns/github_out.png" alt="github" width="50"></a>
			</li>
			<li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/sns/line_out.png"
						alt="LINE" width="50"></a></li>
			<!--li><a href="<?php bloginfo('url'); ?>" ><img src="<?php bloginfo('template_url'); ?>/img/sns/instagram_out.png" alt="instagram" width="50"></a></li-->
		</ul>
	</div>
	<div class="cp_right">©2017-2020 ET WEB DESIGN</div>
</footer>

<!-- jquery -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/content/jquery.waypoints.min.js"></script>

<!-- vue.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>
<!-- vue back-top -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vue-scripts.js"></script>

<!-- JS FILES -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/content/main.js"></script>

<!-- front-page jumbotron 内の文言を自動送り-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/front/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/front/jquery.flexslider-min.js"></script>

<!-- カルーセルスライダー slick　js -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slick/slick.min.js"></script>

<!-- MENU List ソートの際の動き用 js -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/works/jquery.isotope.js"></script>
<!-- MENU List ソート用 js -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/works/custom.js"></script>

<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.js"></script>

<!-- front-page 中央寄せ両サイド表示（レスポンシブ）js -->
<script type="text/javascript">
	$(function () {
		$('.center-item').slick({
			infinite: true,
			dots: true,
			slidesToShow: 1,
			centerMode: true, //要素を中央寄せ
			centerPadding: '100px', //両サイドの見えている部分のサイズ
			autoplay: true, //自動再生
			responsive: [{
				breakpoint: 480,
				settings: {
					centerMode: false,
				}
			}]
		});
	});
</script>

<!-- 要素をフェードイン + 上移動 js -->
<script type="text/javascript">
	$(function () {
		$('.fadein-mv09').on('inview', function (event, isInView, visiblePartX, visiblePartY) {
			console.log(isInView);
			if (isInView) {
				$(this).stop().addClass('mv09');
			} else {
				$(this).stop().removeClass('mv09');
			}
		});
	});
</script>

<!-- シェアボタン js -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/content/jquery.easy-rollover.min.js"></script>
<script type="text/javascript">
	$(function () {
		//シェアボタン　マウスオーバー挙動
		$('img').easyRollover();
	});
</script>

<script type="text/javascript">
	// ページ移動の際の表示設定
	/*設定１*/
	$(window).on('load', function () {
		$('body').removeClass('fadeout');
	});
	/*設定２*/
	$(function () {
		// ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
		$('a:not([href^="#"]):not([target])').on('click', function (e) {
			e.preventDefault(); // ナビゲートをキャンセル
			url = $(this).attr('href'); // 遷移先のURLを取得
			if (url !== '') {
				$('body').addClass('fadeout'); // bodyに class="fadeout"を挿入
				setTimeout(function () {
					window.location = url; // 0.8秒後に取得したURLに遷移
				}, 800);
			}
			return false;
		});
	});
</script>

<?php wp_footer(); ?>
</body>

</html>