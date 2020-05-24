# wel-semi-web-security
> web security handson - RCC welcome seminar 2020

### セットアップ
1. docker for mac を起動(アプリケーションの中のdockerのアイコンをクリックでok)
![](https://github.com/shuta13/wel-semi-web-security/blob/images/images/docker-icon.png)

2. terminal.appを起動し、以下をのコマンドを実行

```bash
git clone https://github.com/shuta13/wel-semi-web-security.git
```

3. `git clone`完了後、`cd`コマンドで移動
```bash
cd wel-semi-web-security
```

4. dockerが起動していれば、以下のコマンドを実行
```bash
docker-compose up -d
```

5. http://localhost:8080 に接続して、この画面が表示されればOK！
![](https://github.com/shuta13/wel-semi-web-security/blob/images/images/phpinfo.png)

### seminar 手順
1. 前回クローンしたリポジトリ内に移動し、`git pull https://github.com/shuta13/wel-semi-web-security.git master` を実行

2. もし `docker-compose ps` でコンテナ起動していれば `docker-compose down`でふっとばす

3. 再度 `docker-compose build`、完了したら `docker-compose up -d`