<?php

// 参考URL　http://original-game.com/how-to-make-wordpress-theme8/

// ウィジェット（サイドバー）を有効にする
function mytheme_widgets_init() {
  register_sidebar( array(
    'name' => 'ウィジェット',
    'id' => 'sidebar',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="title">',
    'after_title' => '</h2>',
  ) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );

// サムネイルを有効にする
add_theme_support( 'post-thumbnails' );

// タイトルタグを自動で出力する
// テンプレートにtitleタグを直接入力しなくても、 functions.php に以下を入力すれば、自動的にtitleタグを出力してくれます。
add_theme_support( 'title-tag' );


// キャプション、コメントフォームなどを HTML5 にする
// 以下の functions.php に入力することで、コメントリスト、コメントフォーム、検索フォーム、ギャラリー、キャプションが、 HTML5 で出力されます。
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


// 投稿フォーマット
// 以下を追加することによって、投稿フォーマットを選択できるようになります。
add_theme_support( 'post-formats', array(
  'aside',
  'image',
  'video',
  'quote',
  'link',
  'gallery',
  'status',
  'audio',
  'chat',
));


// 抜粋の文字数を変更
// 以下の例は、抜粋文の文字数を100文字に変更するものです。
function custom_excerpt_length( $length ) { return 100; }
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// 参考URL　http://webdesignrecipes.com/wordpress-customize-with-functions-php/
// 固定ページで抜粋を使う
add_post_type_support( 'page', 'excerpt' );
// index.php などで抜粋を表示する時は、以下のように書きます。
// <?php the_excerpt();


// カスタムメニュー
add_theme_support( 'menus' );
// header.php など、ナビを出したい部分には以下を書きます。
// <?php wp_nav_menu();

// RSS feed のリンクを表示する
// <?php add_theme_support('automatic-feed-links');


// 抜粋に続きを読むをつける
function new_excerpt_more($more) {
     return ' ... <a class="more" href="'. get_permalink() . '">続きを読む</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// タイトルの文字数を制限して表示する
function titlelimitchar($title){
  if(mb_strlen($title) > 20 && !(is_single()) && !(is_page())){
    $title = mb_substr($title,0,20) . "...";
  }
  return $title;
}
add_filter( 'the_title', 'titlelimitchar' );

// 特定の文字をリンクとかにする
/* 文字列置き換え */
function replace_text_wps($text){
  $replace = array(
    '@twitter' => '<a href="http://twitter.com/WebDesignRecipe" target="_blank" class="twitter-link">@WebDesignRecipe</a>',
    '@facebook' => '<a href="http://www.facebook.com/nori.takahashi" target="_blank" class="facebook-link">facebook プロフィール</a>',
    '@g-plus' => '<a href="https://plus.google.com/116578177130489958038/about" target="_blank" class="g-plus-link">Google+ プロフィール</a>',
  );
  $text = str_replace(array_keys($replace), $replace, $text);
  return $text;
}
add_filter('the_content', 'replace_text_wps');
// 上の例では、記事中に @twitter と書くと、ブラウザで出力するときには @WebDesignRecipe という様に、リンク付きで@WebDesignRecipe に書き換えてくれます。

// ファビコンを表示する
function blog_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('template_url').'/images/favicon.ico" />'."\n";
}
add_action('wp_head', 'blog_favicon');

//管理画面にもファビコン
function admin_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('template_url').'/images/admin-favicon.icon" />';
}
add_action('admin_head', 'admin_favicon');

// プラグインの不要なCSSを読み込まないようにする方法
function my_delete_plugin_files() {
    wp_dequeue_style('wp-pagenavi');
}
add_action( 'wp_enqueue_scripts', 'my_delete_plugin_files' );
// 例　「WP-PageNavi」プラグインの場合、以下のCSSが読み込まれます。
// <link rel='stylesheet' id='wp-pagenavi-css'  href='http://example.com/wp-content/plugins/wp-pagenavi/pagenavi-css.css?ver=2.70' type='text/css' media='all' />


// 検索結果から指定したページを削除
function fb_search_filter($query) {
  if ( !$query -> is_admin && $query -> is_search) {
    $query -> set('post__not_in', array(28, 35) );
  }
  return $query;
}
add_filter( 'pre_get_posts', 'fb_search_filter' );
// 'post__not_in', array( 28, 35 ) では、表示したくないページの ID を指定します。もちろんもっとたくさん指定することもできます！

// RSS feed の抜粋配信に画像を追加
function rss_post_thumbnail($content) {
  global $post;
  if(has_post_thumbnail($post -> ID)) {
    $content = '<p>' . get_the_post_thumbnail($post -> ID) .
    '</p>' . get_the_excerpt();
  }
  return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');

// 記事によって独自のCSSを使いたい
// 管理画面からサクッと更新
//Custom CSS Widget
add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
}
function custom_css_input() {
  global $post;
  echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
  echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
  if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
  $custom_css = $_POST['custom_css'];
  update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
  if (is_page() || is_single()) {
    if (have_posts()) : while (have_posts()) : the_post();
      echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
      endwhile; endif;
      rewind_posts();
  }
}

//　管理画面のロゴ
function my_custom_logo() {
echo '<style type="text/css">
#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/custom-logo.gif) !important; }
</style>';
}
add_action('admin_head', 'my_custom_logo');

//  管理画面のフッターの文字　変更
function remove_footer_admin () {
  echo 'お問い合わせは<a href="http://webdesignrecipes.com/contact/" target="_blank">Webデザインレシピ</a>まで';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//　アドミンバーを消す
function disable_admin_bar(){
  return false;
}
add_filter( 'show_admin_bar' , 'disable_admin_bar');
// ※ 管理ページの ユーザー → ユーザーの編集 → 管理バーの表示 で消すこともできる

// 管理画面の投稿一覧で投稿IDを表示する
 function add_posts_columns_postid($columns) { $columns['postid'] = 'ID'; return $columns; } function add_posts_columns_postid_row($column_name, $post_id) { if( 'postid' == $column_name ) { echo $post_id; } } add_filter( 'manage_posts_columns', 'add_posts_columns_postid' ); add_action( 'manage_posts_custom_column', 'add_posts_columns_postid_row', 10, 2 );

// 固定ページのスラッグをカラムに追加
function add_page_columns($columns) {
  $columns['slug'] = "スラッグ";
  echo '<style>
    .fixed .column-slug {width: 25%;}
    </style>';
    return $columns;
}
function add_page_column_row($column_name, $post_id) {
  if( $column_name == 'slug' ) {
      $post = get_post($post_id);
      $slug = $post->post_name;
      echo esc_attr($slug);
  }
}
add_filter( 'manage_pages_columns', 'add_page_columns');
add_action( 'manage_pages_custom_column', 'add_page_column_row', 10, 2);

/* Bootstrapの style と script を読み込み */
//function my_bootstrap_scripts() {
//wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/lib/css/bootstrap.min.css');
//wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/lib/js/bootstrap.min.js', array(), '1.0.0', true );
//}
//add_action( 'wp_enqueue_scripts', 'my_bootstrap_scripts' );

// Contact Form 7 の CSS と JavaScript の読み込み制御
function my_contact_enqueue_scripts(){
wp_deregister_script('contact-form-7');
wp_deregister_style('contact-form-7');
if (is_page('contact')) {
 if (function_exists( 'wpcf7_enqueue_scripts')) {
        wpcf7_enqueue_scripts();
 }
 if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
 wpcf7_enqueue_styles();
 }
}
}
add_action( 'wp_enqueue_scripts', 'my_contact_enqueue_scripts');

// Contact Form 7 送信後にサンクスページに遷移させる
//ここから
add_action( 'wp_footer', 'mycustom_wp_footer' );

//WordPressでpタグやdivタグなどが自動生成されるタグを制御するコマンド
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');


// スクリプトを読み込むときに自動で挿入される［type属性］を削除して、かつtype属性とasync属性を置換。またjquery.min.jsは除外する
//　参考ページ　https://naoyu.net/async-js/
if(!is_admin()){
function replace_script_tag ( $tag ) {
  if ( strpos( $tag, 'jquery.min.js' ) ) {
    return str_replace( "type='text/javascript' ", '', $tag );
  }
    return str_replace( "type='text/javascript'", 'async', $tag );
}
add_filter( 'script_loader_tag', 'replace_script_tag' );
}


// type="text/css" 等の文字列を出力させないようにする。
//　参考ページ　https://on-ze.com/archives/2513
function remove_style_type($tag) {
  $tag = preg_replace( array( "| type='.+?'s*|","| id='.+?'s*|", '| />|' ), array( ' ',' ', '>' ), $tag );
  return $tag;
}
add_filter('style_loader_tag','remove_style_type');


function mycustom_wp_footer() {
?>
<script>
  if(jQuery('.wpcf7').length){　//formのclassが存在するか判定
    var wpcf7Elm = document.querySelector( '.wpcf7' );
    wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
     location.replace('http://portfolio.sept11.site/thanks/');
   }, false );
  }
</script>
<?php
}
//ここまで


;?>
