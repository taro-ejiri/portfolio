# portfolio

ET ウェブデザイン（ポートフォリオ）

## Authors

Taro Ejiri

## Dependency

### 【 CMS 】

WordPress

### 【 言語、フレームワーク等 】

- SASS(SCSS)
  ※VSCode でコンパイル
- jQuery
- Vue.js(現状は CDN)

### 【 ビルドツール 】

- gulp（コンパイルは VSCode で行う様変更したのでスプライト画像作成や画像圧縮の際に使用）
- Webpack（JS ビルド）※予定

## 環境設定

エディタ:VSCode
ローカル環境は Local by Flywheel を使用  
wp-config.php と themes ファイルのみ編集対象  
node_modules は更新対象外

### 上記以外を編集した場合

WP 固定ページなどダッシュボード内を編集した場合

1. Local 環境で「All-in-One WP Migration」からエクスポート
2. 本番環境の「All-in-One WP Migration」へインポート
