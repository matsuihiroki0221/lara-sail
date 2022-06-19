Ubuntuでのdokerエンジン起動法
sudo service docker start

Bashエイリアスコマンド
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

コンテナ起動法
sail up -d

コンテナ停止法
sail stop