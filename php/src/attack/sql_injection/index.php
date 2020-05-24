<div>
  <h2> SQLインジェクション </h2>

  <p>
    <i>フォームに入力した値でデータベース内部のデータ操作する攻撃</i><br />
  </p>

  <h3>以下のIDとその他やばい感じの文字列で検索</h3>

  <ul>
    <li>3</li>
    <li>0 OR TRUE; --</li>
    <li>0 OR TRUE; DELETE FROM ws_table; --</li>
  </ul>

  <form method="POST" action="index.php">
    <input type="text" name="id" />
    <input type="submit" value="検索" />
  </form>

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

        $id = $_POST["id"];
      
        // 検索用クエリ
        $sql = "SELECT * FROM ws_table WHERE id = " . $id . ";";

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
</div>