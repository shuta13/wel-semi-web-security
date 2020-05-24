<div>
  <h2> CSRF(クロスサイトリクエストフォージェリ) </h2>

  <p>
    <i>ユーザーの意図しない操作を強制する攻撃</i>
  </p>

  <p style="color: gray;">
    <i>データベースにユーザーを追加する</i>
  </p>

  <h3>追加前</h3>

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
    <i>以下のユーザーを新しく追加しようとする</i>
  </p>

  <ul>
    <li>Zeppeli</li>
    <li>Diego Brando</li>
  </ul>

  <form method="POST" action="index.php">
    <input type="text" name="name" />
    <input type="submit" value="送信" />
  </form>
  <?php
    try {
      $dsn = "mysql:host=ws_mysql;dbname=ws_db;";
      $user = "root";
      $password = "root";
      $db = new PDO($dsn, $user, $password);

      $name = $_POST["name"];
    
      // データ追加用クエリ
      $sql = "INSERT INTO ws_table (name) VALUES (:name)";

      $stt = $db->prepare($sql);
      $stt->bindValue(":name", $_POST["name"]);
      $stt->execute();
    } catch (PDOException $e) {
      echo $e;
      exit;
    }
  ?>

  <h3>強制的に別のデータが追加された結果</h3>

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