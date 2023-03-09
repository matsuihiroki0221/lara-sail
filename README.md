# セルフオーダーシステム<br>
    ・バックエンド側　PHP(Laravel)<br>
    ・フロントエンド　TypeScript(Vue.js(composition api))<br>

## やりたい事<br>
### ・完了済<br>
    Laravel Sailを使用して、環境構築する
        所感：WSLの設定がうまくいかず、時間がかかってしまった。PC自体の事を勉強する良い機会になった。
    リポジトリパターンを使用する
        所感：勧められている方法で実装したが、サービスコンテナを経由するメリットなどが得られたと思わない（大規模じゃないからか？）。<br>
        他の方法と比較して理解を深める必要あり。
    scssファイルを記載し、共通cssをvue.jsに適応させる
        所感：難しくはなかったが、WebPackの設定などを知ることができた
    vue-router・vuex・axiosなどは機能毎にモジュール化する
    フォームリクエストを使用してバリデーションを実行する
        所感：特になし
    APIリソースを使用して、JSONレスポンスを整える
    qrcodeを出力する
    laravel sanctumをusers以外のテーブルかつemail以外でパラメータで認証する
        所感
            認証方法を変更するによって、実装途中はエラーを起こす事があったが、
            認証の仕組みをより深く知ることができてよかった。
    Modelと一緒にrelationを使用する
        所感：Modelやrelationに関するLaravelのメソッドなどがたくさんあり、どの場面でどのメソッドが使用できるか頭の片隅にいれておきたい。
    リソースコントローラを使用する
        所感
        リソースコントローラの存在を知ったので、既に記載してあったルーティングを修正した。コード量は減ったので、良かった。
        ただ、ModelのUpdateをする際に、formDataをpostで登録していたのをputメソッドで登録するように変更したら、送信できなくなった。良い勉強になった。

### ・対応中<br>
    ブロードキャスト・プッシャーを使用して、フロント側でリアルタイムでオーダー情報を取得する<br>
    所感：実装途中だが、apiResourceでJsonを成形する際に、Relationを追加する処理に手間取った。
        そもそも、入れ子のように値を取得して、取得する情報が多いのではないかと。。。

### ・未対応<br>
    httpテストを実装（実務で経験した事があるため、優先度低め）
    AWSにデプロイ（重要）
        Fargateで構築するか、Lamdaで構築させるか調査中。Laravel Sailを使用しているので、どうするかベストなのかを考えたい。
        Sailだとphpのビルトインサーバを使用しているが、Fargateだと本番用にnginxを使用したdocker-composeファイルを書けばいいのか？
    Github actionsを使用して、ci/cdを構築
    売り上げをcsvで出力する
    売り上げなどをグラフで出力する
    csfixer・phpstan・eslintの導入
    store（ユーザー）新規登録画面
    オーダー一覧・会計画面実装
   <br><br> 

##実行手順
windowsだと要WSL環境<br>

git hubからclone<br>
https://github.com/matsuihiroki0221/lara-sail.git<br>

Ubuntuでのdokerエンジン起動法<br><br>
sudo service docker start<br>

Bashエイリアスコマンド<br>
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'<br>

コンテナ起動法<br><br>
sail up -d<br>

sail composer install<br>
sail npm install<br>

sail php artisan migration<br><br>
sail php artisan db:seed<br>
sail php artisan db:seed --class=CategorySeeder<br>

コンテナ停止法<br>
sail stop<br>
