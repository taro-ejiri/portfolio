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

// gulp scssで行われるタスク
gulp.task("scss", function() {

// ★ style.scssファイルを監視　//自動で更新されたくない場合はこの下のreturn gulp.watch...を削除
  return gulp.watch("sass/**/*.scss", function () {

    // 下記フォルダにあるscssファイルが対象
    return gulp.src('sass/**/*.scss')

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

        // cssフォルダー以下に保存
        .pipe(gulp.dest("css"))
  });
});

/// npx gulp コマンドで動かすもの ////////////////////////////////////////////
gulp.task('default', gulp.task('scss'));

/// watch　が設定されてるんで、自動的にscssが更新されます。