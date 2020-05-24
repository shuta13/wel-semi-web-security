<div>
  <h2> CSRF(クロスサイトリクエストフォージェリ) </h2>

  <p>
    <i>ユーザーの意図しない操作を強制する攻撃</i>
  </p>

  <p style="color: gray;">
    <i>データベースにユーザーを追加する</i>
  </p>

  <h3>追加される前</h3>

  <table border="1">
    <tbody><tr>
      <th>id</th>
      <th>名前</th>
    </tr>
      <tr>
        <td>1</td>
        <td>shuta</td>
      </tr>
          <tr>
        <td>2</td>
        <td>hide</td>
      </tr>
          <tr>
        <td>3</td>
        <td>Jojo</td>
      </tr>
          <tr>
        <td>4</td>
        <td>Dio</td>
      </tr>
      <tr>
        <td>5</td>
        <td>Speedwagon</td>
      </tr>
    </tbody>
  </table>

  <p style="color: gray;">
    <i>データを新しく追加しようとするが...</i>
  </p>

  <form method="POST" action="index.php">
    <input type="text" name="name" value="" />
    <input type="submit" value="送信" />
  </form>

  <?php
    if ($_POST["name"] !== null || $_POST["name"] !== "") {
      try {
        $dsn = "mysql:host=ws_mysql;dbname=ws_db;";
        $user = "root";
        $password = "root";
        $db = new PDO($dsn, $user, $password);

        $name = $_POST["name"];

        if ($name != "") {
          // データ追加用クエリ
          $sql = "INSERT INTO ws_table (name) VALUES (:name)";
  
          $stt = $db->prepare($sql);
          $stt->bindValue(":name", $_POST["name"]);
          $stt->execute();
        }
      } catch (PDOException $e) {
        echo $e;
        exit;
      }
    }
  ?>

  <p style="color: gray;">
    <i>気の迷いで以下のリンクをクリックしてしまったとする</i>
  </p>

  <p>
    <a href="./fake.php">みんなでもらった10万円集めて大仏を建てよう！詳しくはこのリンクをクリック！</a>
  </p>

  <h3>追加された後</h3>

  <table border="1">
    <tr>
      <th>id</th>
      <th>名前</th>
    </tr>
    <?php
      try {
        $dsn = "mysql:host=ws_mysql;dbname=ws_db;";
        $user = "root";
        $password = "root";
        $db = new PDO($dsn, $user, $password);
      
        // 検索用クエリ
        $sql = "SELECT * FROM ws_table;";

        $stt = $db->prepare($sql);
        $stt->execute();

        // 検索結果をwhileで表示
        while ($result = $stt->fetchAll(PDO::FETCH_ASSOC)) {
          foreach($result as $value) {
    ?>
          <tr>
            <td><?=$value["id"] ?></td>
            <td><?=$value["name"] ?></td>
          </tr>
    <?php
          }
        }
      } catch (PDOException $e) {
        echo $e;
        exit;
      }
    ?>
  </table>

  <a href="http://localhost:8080">戻る</a>
  
</div>