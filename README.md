# portfolio
 ETウェブデザイン（ポートフォリオ）
## Authors
Taro Ejiri
## Dependency
### 【 CMS 】 
WordPress
### 【 言語、フレームワーク等 】
- SASS(SCSS)
- jQuery
- Vue.js(現状はCDN)
### 【 ビルドツール 】
gulp（CSS、画像圧縮 etc）  
Webpack（JSビルド）※予定
## 環境設定
ローカル環境は Local by Flywheelを使用  
wp-config.php と themesファイルのみ編集対象  
node_modulesは更新対象外
### 上記以外を編集した場合
WP固定ページなどダッシュボード内を編集した場合
1. Local環境で「All-in-One WP Migration」からエクスポート
2. 本番環境の「All-in-One WP Migration」へインポート
