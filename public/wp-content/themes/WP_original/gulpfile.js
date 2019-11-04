/// gulp4.0 ////////////////////////////////////////////
// 参考URL https://haniwaman.com/gulp-sass/


// gulpプラグインの読み込み
const gulp = require("gulp");
// Sassをコンパイルするプラグイン
const sass = require("gulp-sass");
//ベンダープレフィックス用
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer'); 
// CSSプロパティを並び替える
const cssdeclsort = require('css-declaration-sorter');
//メディアクエリを1つにまとめる
const mmq = require('gulp-merge-media-queries');

//スプライト画像用プラグイン
const spritesmith = require('gulp.spritesmith');

// 圧縮率を高めるのにプラグインを入れる
const imagemin = require('gulp-imagemin');
const imageminPng = require('imagemin-pngquant');
const imageminGif = require('imagemin-gifsicle');


// gulp scssで行われるタスク
gulp.task("scss", function() {

// ★ style.scssファイルを監視　//自動で更新されたくない場合はこの下のreturn gulp.watch...を削除
  return gulp.watch("src/sass/**/*.scss", function () {

    // 下記フォルダにあるscssファイルが対象
    return gulp.src('src/sass/**/*.scss')

        // コンパイル時の整形された際、閉じカッコで
        .pipe(sass({outputStyle: "expanded"}))

        // Sassのコンパイルエラーを表示
        // (これがないと自動的に止まってしまう)
        .on("error", sass.logError)
        
        //ベンダープレフィックスを自動付与する
        .pipe(postcss([autoprefixer()]))

        // CSSプロパティを並び替える  
        // Alphabetically(アルファベット順)  SMACSS(重要なプロパティ順) Concentric CSS(ボックスモデルの外から内)
        .pipe(postcss([cssdeclsort({ order: 'SMACSS' })]))

        // メディアクエリを1つにまとめる
        .pipe(mmq())

        // cssフォルダー以下に保存
        .pipe(gulp.dest("dist/css"))
  });
});

// gulp sprite で行われるタスク
gulp.task('sprite', () => {
  let spriteData = gulp.src('src/images/sprite/*.png')
    .pipe(spritesmith({
      imgName: 'sprite.png',                        // スプライト画像
      cssName: '_sprite.scss',                      // 生成される CSS テンプレート
      imgPath: 'dist/images/sprite.png', // 生成される CSS テンプレートに記載されるスプライト画像パス
      cssFormat: 'scss',                            // フォーマット拡張子
      cssVarMap: (sprite) => {
        sprite.name = "sprite-" + sprite.name;      // 生成される CSS テンプレートに変数の一覧を記述
      }
    }));
  spriteData.img
    .pipe(gulp.dest('dist/images'));     // imgName で指定したスプライト画像の保存先
  return spriteData.css
    .pipe(gulp.dest('src/sass'));       // cssName で指定した CSS テンプレートの保存先
});

// gulp imagemin で行われるタスク
gulp.task('imagemin', function () {
  gulp.src('img/*.{jpg,jpeg,png,gif,svg}')
    .pipe(imagemin(
      [
        pngquant({ quality: '65-80', speed: 1 }),
        mozjpeg({ quality: 80 }),
        imagemin.svgo(),
        imagemin.gifsicle()
      ]
    ))
    .pipe(gulp.dest('img/min'));
});

/// npx gulp コマンドで動かすもの ////////////////////////////////////////////
gulp.task('default', gulp.task('scss'));

/// watch　が設定されてるんで、自動的にscssが更新されます。