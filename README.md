# セルフオーダーシステム<br>
    ・バックエンド側　PHP(Laravel)<br>
    ・フロントエンド　TypeScript(Vue.js(composition api))<br>

## 作成した背景・動機<br>
セルフオーダーできるWebアプリケーションを作成したかったわけではない。<br>
業務では、LumenとAngularを使用している。業務に活かすため学習をしている。<br>
普段の学習は、Laravelが使用されたアプリのオープンソースをコードリーディングを読むことを重きを置いている。<br>
そのアウトプットと自分が試したいライブラリなどを考えていると、<br>
セルフオーダーシステム作成なら勉強になると思い作成中。<br>

## コードリーディングに力をいれている理由<br>
自分自身が不足しているのは、年数ではなく、質の良いコードに触れたり、レビューしてもらう経験であると思う。それを補う為に、オープンソースのコードを読んでいる。<br>
コードリーディングをする前は、とりあえずコードを記載してみるようにしていたが、汚いコードになってしまい、持っている知識だけで実装してしまう為、成長に繋がらないと思った。<br>
それをきっかけにLaravelの学習方法を調べていると、コードリーディングが勉強になると知り、<br>
やるようになった。
綺麗なコードの書き方や、Laravelの知らない機能を知ることができ、参考なった。<br>
Laravelを深く知ることが、webアプリを深く知るにつながると思うので、今後も続けていきたい。<br>
できれば、vue.jsのよいOSSのコードリーディングをしたいが、中々見つからない。<br>


## やりたい事<br>
### ・完了済<br>
    Laravel Sailを使用して、環境構築する
        所感：WSLの設定がうまくいかず、時間がかかってしまった。PC自体の事を勉強する良い機会になった。
    リポジトリパターンを使用する
        所感：勧められている方法で実装したが、サービスコンテナを経由するメリットなどが得られたと思わない（大規模じゃないからか？）。<br>
        他の方法と比較して理解を深める必要あり。
    scssファイルを記載し、共通cssをvue.jsに適応させる
        所感：難しくはなかったが、WebPackの設定などを知ることができた
    Vue.jsはTypeScriptとcomposition Apiを使用して記載する
        所感
            java scriptと違い、型を意識する必要があり、java scriptだけの感覚でいたら正直大変だ。。。
            だが、返値などやり取りする値など意識するため、勉強になった。phpstanを使用した事があるが、
            それも型を意識しないといけなかったし、それも良い経験になった。
    vue-router・vuex・axiosなどは機能毎にモジュール化する
        所感：
            実務を意識して書く事ができた。もっと綺麗な書き方がないか調査したい。
    フォームリクエストを使用してバリデーションを実行する
        所感：特になし
    APIリソースを使用して、JSONレスポンスを整える
        所感：フロント側での値の受け渡しをする際に、必要だと思った
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
