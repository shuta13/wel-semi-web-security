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

### 攻撃の前に準備
1. 前回クローンしたリポジトリ内に移動し、`git pull https://github.com/shuta13/wel-semi-web-security.git master` を実行

2. 以下のコマンドでdockerが起動しているか確認
```bash
docker-compose ps
```
もしコンテナがupしている場合(多分3つある)
```bash
docker-compose down
```
で一旦ふっとばす

なにも無ければ3.にそのまま移動

3. 再度 `docker-compose build`

4. 完了したら `docker-compose up -d`

5. http://localhost:8080 に接続

### 攻撃手順
> 一応zoomとかで話せそうなら全部順番話した方が良いと思うので話しますが一応書いておきます

1. XSS(クロスサイトスクリプティング) : http://localhost:8080/attack/xss/index.php
- `以下の内容でコメントする` と書いてある項目を1つ選んでは、上のテキストエリアにコピペして `[送信]` をクリックしてみる
- 一番最後の長ったらしいのは
  - コピペする
  - `<>script<>`と`<>/script<>`を`<script>`と`</script>`に書き換える (不等号の片割れを消してscriptを囲えば良いです)
  - `[送信]`をクリック
  - こいつを実行すると...

2. CSRF(クロスサイトリクエストフォージェリ) : http://localhost:8080/attack/csrf/index.php
- 入力欄になんか適当な文字(アルファベット、英数)を入れて、`[送信]`を押すと **追加された後** に `id` にデータベースの中身が表示される
- 入力欄の下の怪しげなリンクをクリックしてみる
- 城○茂が表示されるので、下の `ご協力ありがとうございます！` をクリック
- すると...

3. SQLインジェクション : http://localhost:8080/attack/sql_injection/index.php
> 一番派手にバーーーン！！ってやるので絶対に最後にしてください
- `CSRF攻撃で使ったDBから以下の条件で検索する` の項目を入力欄に入力して `[検索]` をクリックしてみる
  - `CSRF攻撃で使ったDBから以下の条件で検索する` の項目の2つ目と3つ目はコピペでOK
- 3つ目をコピペして`[検索]`を押すと...

なにか困った点があればいつでもShutaにどぞ〜〜〜〜